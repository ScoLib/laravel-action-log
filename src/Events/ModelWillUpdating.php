<?php


namespace Sco\ActionLog\Events;

class ModelWillUpdating extends BaseModelEvent
{
    public $type = 'updating';
}
