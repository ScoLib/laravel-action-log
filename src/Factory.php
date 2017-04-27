<?php

namespace Sco\ActionLog;

use Auth;
use Sco\ActionLog\Events\AbstractEvent;
use Sco\ActionLog\Models\ActionLog;

class Factory
{
    public function event(AbstractEvent $event)
    {
        $this->info(
            $event->type,
            $event->model->getOriginal(),
            $event->model->getTable(),
            $event->userId
        );
    }

    public function info($type, $content, $tableName = '', $userId = null)
    {
        $log = new ActionLog();

        $log->user_id = $userId ?: (Auth::id() ? Auth::id() : 0);

        $log->type       = $type;
        $log->table_name = $tableName;
        $log->content    = is_array($content) ? json_encode($content) : $content;

        $log->ip = request()->getClientIp();

        $log->save();
    }
}
