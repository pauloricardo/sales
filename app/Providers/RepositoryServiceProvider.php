<?php

namespace CodeDelivery\Providers;

use CodeDelivery\Models\Category;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         *  A segunda classe ir� conter o ORM que ser� utilizado.
         *  Desta forma, pode-se utilizar diversos ORMs com somente uma classe.
         */
        $this->app->bind(
            'CodeDelivery\Repositories\CategoryRepository',
            'CodeDelivery\Repositories\CategoryRepositoryEloquent'
        );
    }
}
