<?php


namespace Sco\ActionLog\Listeners;


use Illuminate\Contracts\Queue\ShouldQueue;
use Sco\ActionLog\Events\ActionLogEvent;

class SaveActionLog implements ShouldQueue
{

    public function handler(ActionLogEvent $event)
    {
        \Log::info($event->type, $event->model->getOriginal());
    }
}
