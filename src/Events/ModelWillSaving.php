<?php


namespace Sco\ActionLog\Events;

class ModelWillSaving extends AbstractEvent
{
    public $type = 'saving';
}
