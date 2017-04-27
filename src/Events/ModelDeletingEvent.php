<?php


namespace Sco\ActionLog\Events;

class ModelDeletingEvent extends ActionLogEvent
{
    public $type = 'deleting';
}
