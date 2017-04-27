<?php


namespace Sco\ActionLog\Events;

class ModelRestoredEvent extends ActionLogEvent
{
    public $type = 'restored';
}
