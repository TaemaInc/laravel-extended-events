<?php

namespace Taema\LaravelExtendedEvents\Events;

use Illuminate\Queue\SerializesModels;

class JobFailedEvent
{
    use SerializesModels;

    /**
     * @var \Exception
     */
    public $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }
}