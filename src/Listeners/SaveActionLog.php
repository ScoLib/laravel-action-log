<?php


namespace Sco\ActionLog\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Sco\ActionLog\Events\AbstractEvent;

class SaveActionLog implements ShouldQueue
{
    public function handle(AbstractEvent $event)
    {
        app('ActionLog')->event($event);
    }
}
