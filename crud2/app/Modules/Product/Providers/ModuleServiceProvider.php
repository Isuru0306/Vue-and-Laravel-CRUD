<?php

namespace App\Modules\Product\Providers;

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
        $this->loadTranslationsFrom(module_path('product', 'Resources/Lang', 'app'), 'product');
        $this->loadViewsFrom(module_path('product', 'Resources/Views', 'app'), 'product');
        $this->loadMigrationsFrom(module_path('product', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('product', 'Config', 'app'));
        }
//        $this->loadFactoriesFrom(module_path('product', 'Database/Factories', 'app'));
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
