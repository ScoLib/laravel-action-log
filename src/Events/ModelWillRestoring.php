<?php


namespace Sco\ActionLog\Events;

class ModelWillRestoring extends BaseModelEvent
{
    public $type = 'restoring';
}
