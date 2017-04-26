<?php


namespace Sco\ActionLog\Events;

class ModelUpdatedEvent extends ActionLogEvent
{
    public $type = 'updated';
}
