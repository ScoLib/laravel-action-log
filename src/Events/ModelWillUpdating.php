<?php


namespace Sco\ActionLog\Events;

class ModelWillUpdating extends AbstractEvent
{
    public $type = 'updating';
}
