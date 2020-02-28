<?php

namespace Modules\Admin\Providers;

use function foo\func;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Http\Controllers\MenuController;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('menu', function () {
            $name = include( __DIR__.'/../Config/config.php');
            return [
                $name['name'] => include(__DIR__ . '/../Config/menus.php')
            ];
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
