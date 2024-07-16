<?php

    namespace App\Http\Controllers\Painel;

    use App\Http\Controllers\Painel\StandardController;
    use App\Http\Requests\Painel\TeamFormRequest;
    use App\Models\Painel\Team;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class TeamController extends StandardController
    {
    protected $model;
    protected $title        = "Team";
    protected $view         = "Painel.teams";
    protected $route        = "teams";
    protected $permissions  = "team";
    protected $name         = ["single" => "teams", "plus" => "teams"];
    protected $upload       = [
        "name" => "image",
        "path" => "teams"
    ];

    public function __construct(Team $teams)
    {
        $this->model = $teams;

        # FUNCTION PERMISSÕES DE ACESSOS
        $this->acl();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamFormRequest $request)
    {
        $dataForm = $request->all();

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;


        if ($this->upload && $request->hasFile($this->upload['name'])) {

            $image = $request->file($this->upload['name']);

            $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

            $upload = $image->storeAs($this->upload['path'], $nameFile);

            if ($upload) {
                $dataForm[$this->upload['name']] = $nameFile;
            } else {
                return redirect()
                    ->route("{$this->route}.create")
                    ->withErrors(['errors' => 'Erro no Upload!'])
                    ->withInput();
            }

        }

        $insert = $this->model->create($dataForm);

        if ($insert)
            return redirect()
                ->route("{$this->route}.index")
                ->with(['success' => 'Cadastro realizado com sucesso!']);
        else
            return redirect()->route("{$this->route}.create")
                            ->withErrors(['errors' => 'Falha ao cadastrar!'])
                            ->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdd(TeamFormRequest $request)
    {
        $dataForm = $request->all();

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;


        if ($this->upload && $request->hasFile($this->upload['name'])) {

            $image = $request->file($this->upload['name']);

            $nameFile = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

            $upload = $image->storeAs($this->upload['path'], $nameFile);

            if ($upload) {
                $dataForm[$this->upload['name']] = $nameFile;
            } else {
                return redirect()
                    ->route("{$this->route}.create")
                    ->withErrors(['errors' => 'Erro no Upload!'])
                    ->withInput();
            }

        }

        $insert = $this->model->create($dataForm);

        if ($insert)
            return redirect()
                ->route("{$this->route}.create")
                ->with(['success' => 'Cadastro realizado com sucesso!']);
        else
            return redirect()->route("{$this->route}.create")
                            ->withErrors(['errors' => 'Falha ao cadastrar!'])
                            ->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamFormRequest $request, $id)
    {
        //Pega todos os dados do categoria
        $dataForm = $request->all();

        # URL DA PÁGINA COM A PAGINAÇÃO
        $url = $dataForm['redirects_to'];

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

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
            return redirect()->route("{$this->route}.edit", ['id' => $id])
                            ->withErrors(['errors' => 'Erro no Upload'])
                            ->withInput();
        }

    }

        //Altera os dados do categoria
        $update = $data->update($dataForm);

        if ($update)
            return redirect()
                //->back()
                //->route("{$this->route}.index")
                ->to($url)
                ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route("{$this->route}.edit", ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao editar'])
                            ->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function updateTrash(TeamFormRequest $request, $id)
    {
        //Pega todos os dados do categoria
        $dataForm = $request->all();

        # URL DA PÁGINA COM A PAGINAÇÃO
        $url = $dataForm['redirects_to'];

        # AJUSTA O STATUS PARA PODER ATUALIZAR NO BANCO
        $dataForm['status'] = isset($dataForm['status']) ? 1 : 0;

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
            return redirect()->route("{$this->route}.edit.trash", ['id' => $id])
                            ->withErrors(['errors' => 'Erro no Upload'])
                            ->withInput();
        }

    }

        //Altera os dados do categoria
        $update = $data->update($dataForm);

        if ($update)
            return redirect()
                ->to($url)
                ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route("{$this->route}.edit.trash", ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao editar'])
                            ->withInput();
    }

}
