<?php

namespace Sco\ActionLog;

use Auth;
use Sco\ActionLog\Events\AbstractEvent;
use Sco\ActionLog\Models\ActionLogModel;

class Factory
{
    /**
     * Logging Action By Event
     *
     * @param \Sco\ActionLog\Events\AbstractEvent $event
     *
     * @return bool
     */
    public function event(AbstractEvent $event)
    {
        $userId = $event->getAttribute('user_id', 0);
        if (!$userId && !config('actionlog.guest')) {
            return false;
        }

        $log = new ActionLogModel();

        $log->user_id    = $userId;
        $log->type       = $event->getAttribute('type', '');
        $log->table_name = $event->getAttribute('model.table', '');
        $log->content    = json_encode($event->getContent());
        $log->client_ip  = $event->getAttribute('client_ip', '');
        $log->client     = json_encode($event->getAttribute('client', []));

        $log->save();

        return true;
    }

    /**
     * Logging Action
     *
     * @param string       $type
     * @param string|array $content
     * @param string       $tableName
     *
     * @return bool
     */
    public function info($type, $content, $tableName = '')
    {
        $log = new ActionLogModel();

        $userId = Auth::id();
        if (!$userId && !config('actionlog.guest')) {
            return false;
        }

        $log->user_id    = $userId;
        $log->type       = $type;
        $log->table_name = $tableName;
        $log->content    = is_array($content) ? json_encode($content) : $content;
        $log->client_ip  = request()->getClientIp();

        $log->save();

        return true;
    }

    public function __call($method, $parameters)
    {
        return (new ActionLogModel)->$method(...$parameters);
    }


    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }
}
