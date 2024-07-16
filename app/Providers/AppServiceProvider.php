<?php

    namespace App\Providers;

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            # QUANTIDADE MAXÍMA DE CARACTERES PARA CAMPOS DO TIPO STRING
            Schema::defaultStringLength(191);
        }
    }
