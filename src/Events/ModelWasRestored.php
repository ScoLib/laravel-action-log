<?php


namespace Sco\ActionLog\Events;

class ModelWasRestored extends BaseModelEvent
{
    public $type = 'restored';
}
