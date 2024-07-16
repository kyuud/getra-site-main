<?php

    namespace App\Providers;

    use App\Models\Painel\acl\Permission;
    use App\User;
    use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
    use Illuminate\Support\Facades\Gate;
    use Illuminate\Contracts\Auth\Access\Gate as GateContract;

    class AuthServiceProvider extends ServiceProvider
    {
        /**
         * The policy mappings for the application.
         *
         * @var array
         */
        protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
        ];

        /**
         * Register any authentication / authorization services.
         *
         * @return void
         */
        public function boot(GateContract $gate)
        {
            $this->registerPolicies();

            $permissions = Permission::with('roles')->where("deleted_at", "=", null)->get();

            foreach ($permissions as $permission) {

                $gate->define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }

            /*
             * SUPER ADM
             */
            $gate->before(function (User $user, $ability) {

                if ($user->hasAnyRoles('super-adm')) {
                    return true;
                }

            });

        }
    }
