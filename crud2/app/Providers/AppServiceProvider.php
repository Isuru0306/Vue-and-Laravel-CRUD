<?php

namespace App\Providers;

use App\Modules\Product\Contracts\ProductRepoInterface;
use App\Modules\Product\Repositories\ProductsRepository;
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
//        $this->app->bind(ProductRepoInterface::class, ProductsRepository::class);
        $this->app->bind('App\Modules\Product\Contracts\ProductRepoInterface', 'App\Modules\Product\Repositories\ProductsRepository');
        $this->app->bind('App\Modules\Taskmanager\Contracts\TaskManagerInterface', 'App\Modules\Taskmanager\Repositories\TaskManagerRepository');
//      $this->app->bind(TaskRepoInterface::class,TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
