<?php

namespace Sco\ActionLog;

use Illuminate\Database\Eloquent\Model;
use Sco\ActionLog\Models\ActionLog;

class Factory
{
    public function model($type, Model $model)
    {
        $this->info($type, $model->getOriginal(), $model->getTable());
    }

    public function info($type, $content, $tableName = '')
    {
        $log = new ActionLog();

        $user = auth()->user();
        $log->user_id = $user ? $user->getAuthIdentifier() : 0;

        $log->type       = $type;
        $log->table_name = $tableName;
        $log->content    = is_array($content) ? json_encode($content) : $content;

        $log->ip = request()->getClientIp();

        $log->save();
    }
}
