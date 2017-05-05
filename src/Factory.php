<?php

namespace Sco\ActionLog;

use Carbon\Carbon;
use Sco\ActionLog\Models\ActionLogModel;

class Factory
{

    /**
     * Logging Action
     *
     * @param \Sco\ActionLog\LogInfo $info
     *
     * @return bool
     */
    public static function info(LogInfo $info)
    {
        $log = new ActionLogModel();

        if (!$info->getUserId() && !config('actionlog.guest')) {
            return false;
        }

        $content = $info->getContent();
        $client  = $info->getClient();

        $userKey = config('actionlog.user_foreign_key');

        $log->$userKey   = $info->getUserId();
        $log->type       = $info->getType();
        $log->content    = is_string($content) ? $content : json_encode($content);
        $log->client_ip  = $info->getClientIp();
        $log->client     = is_string($client) ? $client : json_encode($client);
        $log->created_at = Carbon::now();
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
