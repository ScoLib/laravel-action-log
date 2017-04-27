<?php


namespace Sco\ActionLog\Events;

class ModelSavingEvent extends ActionLogEvent
{
    public $type = 'saving';
}
