<?php


namespace Sco\ActionLog\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Sco\ActionLog\Events\ActionLogEvent;

class SaveActionLog implements ShouldQueue
{
    public function handle(ActionLogEvent $event)
    {
        app('ActionLog')->model($event->type, $event->model);
    }
}
