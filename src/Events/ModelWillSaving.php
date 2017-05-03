<?php


namespace Sco\ActionLog\Events;

class ModelWillSaving extends BaseModelEvent
{
    public $type = 'saving';
}
