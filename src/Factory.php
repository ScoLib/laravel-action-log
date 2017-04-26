<?php

namespace Sco\ActionLog;

use Sco\ActionLog\Models\ActionLog;

class Factory
{
    public function info($type, $content)
    {
        $log = new ActionLog();
        \Log::info(var_export(auth()->check(), true));

        $log->user_id = auth()->user()->id;
        $log->type = $type;
        $log->content = is_array($content) ? json_encode($content) : $content;

        $log->ip = request()->getClientIp();

        $log->save();
        
    }
}
