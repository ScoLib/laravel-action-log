<?php


namespace Sco\ActionLog\Traits;

use Sco\ActionLog\Events\ModelCreatedEvent;
use Sco\ActionLog\Events\ModelUpdatedEvent;
use Sco\ActionLog\Events\ModelUpdatingEvent;

trait ActionLogTrait
{
    protected $events = [
        'created' => ModelCreatedEvent::class,
        'updating' => ModelUpdatingEvent::class,
        'updated' => ModelUpdatedEvent::class,
    ];
}
