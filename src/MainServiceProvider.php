<?php

namespace Wisnubaldas\BaldasModule;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new MyHelper;
        parent::__construct(app());
    }

    public function boot()
    {
        $this->app->bind(
            \Wisnubaldas\BaldasModule\modular\ApiCrudInterface::class,
            \Wisnubaldas\BaldasModule\modular\ApiCrudClass::class
        );
        $this->app->bind(
            \Wisnubaldas\BaldasModule\modular\MakeMenuInterface::class,
            \Wisnubaldas\BaldasModule\modular\MakeMenuClass::class
        );
        $this->app->bind(
            \Wisnubaldas\BaldasModule\modular\UseCaseInterface::class,
            \Wisnubaldas\BaldasModule\modular\UseCaseClass::class
        );
        
        // loading routing di package
        $web = $this->helper->route_path('custom-route');
        $this->loadRoutesFrom($web);

        if (App::runningInConsole()) {
            $this->commands([
                console\MakeRoute::class,
                console\MakeUseCase::class,
                console\MakeDomain::class,
                console\MakeApiCrud::class,
                console\MakeMenu::class,
            ]);
        }
    }

    public function register()
    {

        // multiple database connection
        $multiple_connect = $this->helper->multiple_database();
        $this->mergeConfigFrom(
            $multiple_connect,
            'database.connections'
        );
    }

    // protected function mergeConfigFrom($path, $key)
    // {
    //     if (! ($this->app instanceof CachesConfiguration && $this->app->configurationIsCached())) {
    //         $config = app()->make('config');

    //         $config->set($key, array_merge(
    //             require $path, $config->get($key, [])
    //         ));
    //     }
    // }

    // protected function publishConfig() {
    //     $this->publishes([
    //        __DIR__.'/config/multiple-connect.php' => config_path('multiple-connect.php')
    //     ]);
    //     $this->mergeConfigFrom(__DIR__.'/config/multiple-connect.php', 'database.connections');
    // }
}
