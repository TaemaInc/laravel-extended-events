<?php

namespace Taema\LaravelExtendedEvents\Services;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Gate as LaravelGate;
use Illuminate\Container\Container;
use Illuminate\Contracts\Auth\Guard;
use Taema\LaravelExtendedEvents\Events\AuthorizationFailedEvent;

class Gate extends LaravelGate
{
    public function authorize($ability, $arguments = [])
    {
        try {
            return parent::authorize($ability, $arguments);
        } catch (AuthorizationException $e) {
            $container = Container::getInstance();

            /** @var Guard $guard */
            $guard = $container->make('auth');

            if (!is_array($arguments)) {
                $arguments = [$arguments];
            }

            /** @var \Illuminate\Contracts\Events\Dispatcher $dispatcher */
            $dispatcher = $container->make('events');

            $dispatcher->dispatch(new AuthorizationFailedEvent($ability, $arguments, $guard->user()));

            throw $e;
        }
    }

}