<?php


namespace Sco\ActionLog\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Sco\ActionLog\Events\ActionLogEvent;
use ActionLog;

class SaveActionLog implements ShouldQueue
{

    public function handle(ActionLogEvent $event)
    {
        ActionLog::info($event->type, $event->model->getOriginal());
    }
}
