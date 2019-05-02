<?php

namespace Taema\LaravelExtendedEvents\Events;

use Illuminate\Queue\SerializesModels;

class AuthorizationFailedEvent
{
    use SerializesModels;

    /**
     * @var string
     */
    private $ability;
    /**
     * @var array
     */
    private $arguments;
    /**
     * @var null
     */
    private $user;

    public function __construct(string $ability, array $arguments = [], $user = null)
    {
        $this->ability = $ability;
        $this->arguments = $arguments;
        $this->user = $user;
    }
}
