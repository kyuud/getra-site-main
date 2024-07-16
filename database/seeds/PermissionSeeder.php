<?php

    use App\Models\Painel\acl\Permission;
    use Illuminate\Database\Seeder;

    class PermissionSeeder extends Seeder
    {
        # NOME DO MODEL NO SINGULAR
        protected $model = "training"; // user, banner, permission, role, permission-role, role-user,
        # NOME DO MOCEL NO SINGULAR COM A 1º LETRA EM CAIXA ALTA
        protected $name  = "Treinamento";


        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Permission::create([
                                'name'  => "$this->model",
                                'label' => "Acesso ao Módulo de $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-create",
                                'label' => "Criar $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-destroyFake",
                                'label' => "Remover $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-clearTable",
                                'label' => "Limpar Tabela de $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-edit",
                                'label' => "Visualizar Detalhes de $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-update",
                                'label' => "Atualizar $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-trash",
                                'label' => "Acessar Lixeira de $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-editTrash",
                                'label' => "Visualizar Detalhes da Lixeira de $this->name",
                            ]);

            Permission::create([
                                'name'  => "$this->model-updateTrash",
                                'label' => "Atualizar $this->name da Lixeira",
                            ]);

            Permission::create([
                                'name'  => "$this->model-restore",
                                'label' => "Restaurar $this->name da Lixeira",
                            ]);

            Permission::create([
                                'name'  => "$this->model-destroy",
                                'label' => "Remover $this->name Permanentemente",
                            ]);

            Permission::create([
                                'name'  => "$this->model-clearTableForce",
                                'label' => "Limpar Tabela de $this->name Permanentemente",
                            ]);
        }
    }
