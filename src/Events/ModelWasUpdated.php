<?php


namespace Sco\ActionLog\Events;

class ModelWasUpdated extends BaseModelEvent
{
    public $type = 'updated';
}
