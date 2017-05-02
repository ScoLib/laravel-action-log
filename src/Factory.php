<?php

namespace Sco\ActionLog;

use Sco\ActionLog\Handlers\WebHandler;
use Sco\ActionLog\Models\ActionLogModel;

class Factory
{

    public function web($type, $content, $tableName = '')
    {
        return $this->info((new WebHandler([
            'type'       => $type,
            'content'    => $content,
            'table_name' => $tableName
        ]))->info());
    }

    /**
     * Logging Action
     *
     * @param \Sco\ActionLog\LogInfo $info
     *
     * @return bool
     */
    public function info(LogInfo $info)
    {
        $log = new ActionLogModel();

        if (!$info->getUserId() && !config('actionlog.guest')) {
            return false;
        }

        $content = $info->getContent();
        $client  = $info->getClient();

        $log->user_id    = $info->getUserId();
        $log->type       = $info->getType();
        $log->table_name = $info->getTableName();
        $log->content    = is_string($content) ? $content : json_encode($content);
        $log->client_ip  = $info->getClientIp();
        $log->client     = is_string($client) ? $client : json_encode($client);
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
