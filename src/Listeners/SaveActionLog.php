<?php


namespace Sco\ActionLog\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Sco\ActionLog\Events\AbstractEvent;

class SaveActionLog implements ShouldQueue
{
    use SerializesModels;

    public function handle(AbstractEvent $event)
    {
        app('ActionLog')->event($event);
    }
}
