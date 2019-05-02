# laravel-extended-events
Adds two new key events to the Laravel ecosystem

## JobFailedEvent

`\Taema\LaravelExtendedEvents\Events\JobFailedEvent` is dispatched when a job fails. The job needs to use the trait `Taema\LaravelExtendedEvents\Behavior\InteractsWithQueue` instead of the one provided by Laravel. This enables a way to react to all jobs in the project (Logging or reporting via Sentry for example).

| PRoperty | Type | Description |
|----------|------|-------------|
| $exception| \Exception | The caught exception during the job execution |

## AuthorizationFailedEvent

`\Taema\LaravelExtendedEvents\Events\AuthorizationFailedEvent` is dispatched when a Gate or Policy fails in Laravel. This will help debugging where a 403 comes from. This event has the following attributes

| Property | Type | Description |
|----------|------|-------------|
| $ability | string | The tested ability in the Gate or Policy (Usually via the `$this->authorize()` in a controller) |
| $arguments | array | The arguments passed to the ability test (Usually one or many Models). Note that even if the argument is passed a scalar value instead of an array it will be converted to an array (Ex. `$this->authorize('view', $movie)` will provide `$arguments === [$movie]`)  |
| $user | User\|null | The authenticated user if it was available at the moment of the Gate/Policy failure |
