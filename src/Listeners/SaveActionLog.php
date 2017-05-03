<?php


namespace Sco\ActionLog\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Sco\ActionLog\Events\EventInterface;
use Sco\ActionLog\Factory;

class SaveActionLog implements ShouldQueue
{
    use SerializesModels;

    public function handle(EventInterface $event)
    {
        Factory::info($event->getLogInfo());
    }
}
