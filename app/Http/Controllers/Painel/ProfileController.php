<?php

    namespace App\Http\Controllers\Painel;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Painel\ProfileFormRequest;
    use App\Models\Painel\Cell;
    use App\Models\Painel\Profile;
    use App\Models\Painel\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

    class ProfileController extends StandardController
    {
        protected $model, $user;
        protected $title       = "Perfil";
        protected $view        = "Painel.profiles";
        protected $route       = "profiles";
        protected $permissions = "profile";
        protected $name        = ["single" => "usuario", "plus" => "usuarios"];
        protected $upload      = [
            "name" => "image",
            "path" => "users"
        ];

        public function __construct(Profile $profile, User $user)
        {
            $this->model = $profile;
            $this->user  = $user;

            # FUNCTION PERMISSÕES DE ACESSOS
            $this->acl();

        }


        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            /* VERIFICA SE USUÁRIO ESTÁ TENTANDO ATUALIZAR O OUTRO USUÁRIO QUE NÃO SEJA ELE*/
            if( Auth::user()->id != $id)
                return redirect()->back()
                                ->withErrors(['errors' => 'Você não tem permissão para editar este usuário do sistema.'])
                                ->withInput();

            /* VERIFICA SE USUÁRIO ESTÁ TENTANDO ATUALIZAR O OUTRO USUÁRIO QUE NÃO SEJA ELE */
            $this->verifyUser($id);

            $data = $this->model->where("deleted_at", '=', null)->find($id);

            if($data == null)
                return redirect()->route("$this->route.index");

            $title = "Editar {$this->title}: {$data->name}";

            # MENU ATIVO
            $active = $this->route;

            # NOME DA ROTA
            $route = $this->route;

            # NOME PARA MSG
            $name = $this->name;

            return view("{$this->view}.create-edit", compact('data', 'route', 'name', 'title', 'active'));
        }


        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         * @return \Illuminate\Http\Response
         */
        public function update(ProfileFormRequest $request, $id)
        {
            /* VERIFICA SE USUÁRIO ESTÁ TENTANDO ATUALIZAR O OUTRO USUÁRIO QUE NÃO SEJA ELE*/
            if( Auth::user()->id != $id)
                return redirect()->route("dashboard.index")
                                ->withErrors(['errors' => 'Você não tem permissão para editar este usuário do sistema.'])
                                ->withInput();

            /* VERIFICA SE USUÁRIO ESTÁ TENTANDO ATUALIZAR O SUPER USUÁRIO */
            if ($this->verifyUpdateSuperAdm($id) == true) {

                return redirect()->route("{$this->route}.edit", $id)
                                ->withErrors(['errors' => 'Você não tem permissão para editar este usuário do sistema.'])
                                ->withInput();
            }

            //Pega todos os dados do categoria
            $dataForm = $request->all();

            # URL DA PÁGINA COM A PAGINAÇÃO
            $url = $dataForm['redirects_to'];

            # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
            $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

            # CRIPTOGRAFANDO SENHA
            $dataForm['password'] = Hash::make($dataForm['password']);

            //Cria o objeto de categoria
            $data = $this->model->find($id);

            //Verifica se existe a imagem
            if ($this->upload && $request->hasFile($this->upload['name'])) {
            //Pega a imagem
            $image = $request->file($this->upload['name']);

            if ($data->image == '') {
                $nameImage                       = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();
                $dataForm[$this->upload['name']] = $nameImage;
            } else {
                $nameImage = $data->image;
            }

            $upload = $image->storeAs($this->upload['path'], $nameImage);

            if ($upload) {
                $dataForm[$this->upload['name']] = $nameImage;

            } else {
                return redirect()->route("{$this->route}.edit", $id)
                                ->withErrors(['errors' => 'Erro no Upload'])
                                ->withInput();
            }

        }

            //Altera os dados do categoria
            $update = $data->update($dataForm);

            if ($update)
                return redirect()
                    ->route("{$this->route}.edit", $id)
                    ->with(['success' => 'Alteração realizada com sucesso!']);
            else
                return redirect()->route("{$this->route}.edit", ['id' => $id])
                                ->withErrors(['errors' => 'Falha ao editar'])
                                ->withInput();
        }


        /* VERIFICA SE O USUÁRIO É SUPER ADMINISTRADOR */
        public function verifyUpdateSuperAdm($id)
        {
            $response = false;

            if(Auth::user()->roles[0]->name === "super-adm"){
                return $response;
            }else {
                $userUpdate = $this->user->with('roles')->find($id);

                $userRoles  = $userUpdate->roles;

                if(count($userRoles) > 0){
                    for ($i = 0; $i < count($userRoles); $i++) {
                        if ($userRoles[$i]->name == 'super-adm') {
                            $response = true;
                            break;
                        }
                    }
                }

                return $response;
            }

        }


        public function verifyUser($id)
        {
            /* VERIFICA SE USUÁRIO ESTÁ TENTANDO ATUALIZAR O OUTRO USUÁRIO QUE NÃO SEJA ELE*/
            if( Auth::user()->id != $id)
                return redirect()->route("dashboard.index")
                                ->withErrors(['errors' => 'Você não tem permissão para editar este usuário do sistema.'])
                                ->withInput();
        }

    }
