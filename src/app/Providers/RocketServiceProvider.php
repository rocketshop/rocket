<?php

namespace Rocket\Providers;

use Rocket\Console\Install;
use Illuminate\Support\ServiceProvider;

class RocketServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->defineRoutes();
        });

        $this->defineResources();
    }

    /**
     * Define the Rocket routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
        if (! $this->app->routesAreCached()) {
            $router = app('router');

            $router->group(['namespace' => 'Rocket\Http\Controllers'], function ($router) {
                require __DIR__.'/../../routes/api.php';
                require __DIR__.'/../../routes/web.php';
            });
        }
    }

    /**
     * Define the resources used by Rocket.
     *
     * @return void
     */
    protected function defineResources()
    {
        $this->loadViewsFrom(ROCKET_PATH.'/resources/views', 'rocket');

        if ($this->app->runningInConsole()) {
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('ROCKET_PATH')) {
            define('ROCKET_PATH', realpath(__DIR__.'/../../'));
        }

        if (! class_exists('Rocket')) {
            class_alias('Rocket\Rocket', 'Rocket');
        }

        config([
            'auth.password.email' => 'rocket::emails.auth.password.email',
        ]);

        $this->defineServices();

        if ($this->app->runningInConsole()) {
            $this->commands([Install::class]);
        }
    }

    /**
     * Bind the Rocket services into the container.
     *
     * @return void
     */
    protected function defineServices()
    {
        $services = [
        ];

        foreach ($services as $key => $value) {
            $this->app->bindIf($key, $value);
        }
    }
}