<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'partials.nav', 'App\Http\Composers\NavigationMenu'
        );
        view()->composer(
            'partials.profile-dropdown', 'App\Http\Composers\NotificationCount'
        );
        view()->composer(
            'partials.one_page.banner', 'App\Http\Composers\BlogPost'
        );
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {

    }

}
