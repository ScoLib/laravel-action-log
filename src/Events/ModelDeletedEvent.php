<?php


namespace Sco\ActionLog\Events;

class ModelDeletedEvent extends ActionLogEvent
{
    public $type = 'deleted';
}
