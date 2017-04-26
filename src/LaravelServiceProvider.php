<?php


namespace Sco\ActionLog;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Sco\ActionLog\Events\ActionLogEvent;
use Sco\ActionLog\Listeners\SaveActionLog;

class LaravelServiceProvider extends ServiceProvider
{
    protected $listen = [
        ActionLogEvent::class => [
            SaveActionLog::class
        ]
    ];

    public function register()
    {
    }
}
