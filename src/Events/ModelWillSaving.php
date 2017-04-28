<?php


namespace Sco\ActionLog\Events;

class ModelWillSaving extends AbstractEvent
{
    protected $type = 'saving';
}
