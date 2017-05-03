<?php


namespace Sco\ActionLog;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Sco\ActionLog\Listeners\SaveActionLog;

class LaravelServiceProvider extends ServiceProvider
{
    protected $events = [
        \Sco\ActionLog\Events\ModelWillCreating::class,
        \Sco\ActionLog\Events\ModelWasCreated::class,
        \Sco\ActionLog\Events\ModelWillUpdating::class,
        \Sco\ActionLog\Events\ModelWasUpdated::class,
        \Sco\ActionLog\Events\ModelWillSaving::class,
        \Sco\ActionLog\Events\ModelWasSaved::class,
        \Sco\ActionLog\Events\ModelWillDeleting::class,
        \Sco\ActionLog\Events\ModelWasDeleted::class,
        \Sco\ActionLog\Events\ModelWillRestoring::class,
        \Sco\ActionLog\Events\ModelWasRestored::class,
    ];

    public function boot()
    {
        $this->listen = $this->parseEvents();

        parent::boot();

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
            $this->publishConfig();
        }
    }

    private function parseEvents()
    {
        $listens = [];
        foreach ($this->events as $event) {
            $listens[$event] = [
                SaveActionLog::class,
            ];
        }
        return $listens;
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/actionlog.php',
            'actionlog'
        );
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/actionlog.php' => config_path('actionlog.php'),
        ], 'config');
    }
}
