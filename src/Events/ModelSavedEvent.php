<?php


namespace Sco\ActionLog\Events;

class ModelSavedEvent extends ActionLogEvent
{
    public $type = 'saved';
}
