<?php

namespace Taema\LaravelExtendedEvents\Behavior;

use Illuminate\Container\Container;
use Taema\LaravelExtendedEvents\Events\JobFailedEvent;

trait InteractsWithQueue
{
    use \Illuminate\Queue\InteractsWithQueue {
        fail as baseFail;
    }

    public function failed($exception = null)
    {
        /** @var \Illuminate\Contracts\Events\Dispatcher $dispatcher */
        $dispatcher = Container::getInstance()->make('events');

        $dispatcher->dispatch(new JobFailedEvent($exception));

        $this->baseFail($exception);
    }
}