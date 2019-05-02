<?php

namespace Taema\LaravelExtendedEvents\Providers;

use Taema\LaravelExtendedEvents\Services\Gate;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton(GateContract::class, function ($app) {
            return new Gate($app, function () use ($app) {
                return call_user_func($app['auth']->userResolver());
            });
        });
    }
}