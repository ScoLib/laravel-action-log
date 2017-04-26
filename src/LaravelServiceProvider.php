<?php


namespace Sco\ActionLog;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Sco\ActionLog\Events\ModelCreatedEvent;
use Sco\ActionLog\Events\ModelUpdatedEvent;
use Sco\ActionLog\Events\ModelUpdatingEvent;
use Sco\ActionLog\Listeners\SaveActionLog;

class LaravelServiceProvider extends ServiceProvider
{
    protected $listen = [
        ModelCreatedEvent::class  => [
            SaveActionLog::class,
        ],
        ModelUpdatingEvent::class => [
            SaveActionLog::class,
        ],
        ModelUpdatedEvent::class  => [
            SaveActionLog::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
            $this->publishConfig();
        }
    }

    public function register()
    {
        $this->app->singleton('actionlog', function () {
            return new Factory();
        });
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/actionlog.php' => config_path('actionlog.php'),
        ], 'config');
    }
}
