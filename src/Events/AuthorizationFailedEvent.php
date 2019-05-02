<?php

namespace Taema\LaravelExtendedEvents\Events;

use Illuminate\Queue\SerializesModels;

class AuthorizationFailedEvent
{
    use SerializesModels;

    /**
     * @var string
     */
    public $ability;
    /**
     * @var array
     */
    public $arguments;
    /**
     * @var null
     */
    public $user;

    public function __construct(string $ability, array $arguments = [], $user = null)
    {
        $this->ability = $ability;
        $this->arguments = $arguments;
        $this->user = $user;
    }
}
