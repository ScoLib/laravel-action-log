<?php


namespace Sco\ActionLog;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Sco\ActionLog\Listeners\SaveActionLog;

class LaravelServiceProvider extends ServiceProvider
{
    protected $events = [
        \Sco\ActionLog\Events\ModelCreatingEvent::class,
        \Sco\ActionLog\Events\ModelCreatedEvent::class,
        \Sco\ActionLog\Events\ModelUpdatingEvent::class,
        \Sco\ActionLog\Events\ModelUpdatedEvent::class,
        \Sco\ActionLog\Events\ModelSavingEvent::class,
        \Sco\ActionLog\Events\ModelSavedEvent::class,
        \Sco\ActionLog\Events\ModelDeletingEvent::class,
        \Sco\ActionLog\Events\ModelDeletedEvent::class,
        \Sco\ActionLog\Events\ModelRestoringEvent::class,
        \Sco\ActionLog\Events\ModelRestoredEvent::class,
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
        $events = array_merge($this->events, config('actionlog.events'));
        foreach ($events as $event) {
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

        $this->app->singleton('ActionLog', function () {
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
