<?php


namespace Sco\ActionLog\Events;

class ModelWasDeleted extends BaseModelEvent
{
    public $type = 'deleted';
}
