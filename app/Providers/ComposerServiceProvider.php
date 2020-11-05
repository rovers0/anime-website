<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['page.nav','page.slider','page.siderbar','cpadmin.modules.flim.create','cpadmin.modules.flim.edit'],'App\Http\ViewComposers\MovieComposer');
        
    }
}
