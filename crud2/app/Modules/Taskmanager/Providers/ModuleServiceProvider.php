<?php

namespace App\Modules\Taskmanager\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('taskmanager', 'Resources/Lang', 'app'), 'taskmanager');
        $this->loadViewsFrom(module_path('taskmanager', 'Resources/Views', 'app'), 'taskmanager');
        $this->loadMigrationsFrom(module_path('taskmanager', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('taskmanager', 'Config', 'app'));
        }
//        $this->loadFactoriesFrom(module_path('taskmanager', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
