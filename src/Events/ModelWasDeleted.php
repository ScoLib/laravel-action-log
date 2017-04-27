<?php


namespace Sco\ActionLog\Events;

class ModelWasDeleted extends AbstractEvent
{
    public $type = 'deleted';
}
