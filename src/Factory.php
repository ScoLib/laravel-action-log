<?php

namespace Sco\ActionLog;

use Auth;
use Sco\ActionLog\Events\AbstractEvent;
use Sco\ActionLog\Models\ActionLog;

class Factory
{
    /**
     * Logging Action By Event
     *
     * @param \Sco\ActionLog\Events\AbstractEvent $event
     */
    public function event(AbstractEvent $event)
    {
        $log = new ActionLog();

        $log->user_id    = $event->getLogValue('user_id', 0);
        $log->type       = $event->type;
        $log->table_name = $event->model->getTable();
        $log->content    = json_encode($event->getContent());
        $log->ip         = $event->getLogValue('ip', '');

        $log->save();

    }

    /**
     * Logging Action
     *
     * @param string       $type
     * @param string|array $content
     * @param string       $tableName
     */
    public function info($type, $content, $tableName = '')
    {
        $log = new ActionLog();

        $log->user_id    = Auth::id() ? Auth::id() : 0;
        $log->type       = $type;
        $log->table_name = $tableName;
        $log->content    = is_array($content) ? json_encode($content) : $content;
        $log->ip         = request()->getClientIp();

        $log->save();
    }
}
