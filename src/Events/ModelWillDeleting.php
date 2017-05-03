<?php


namespace Sco\ActionLog\Events;

class ModelWillDeleting extends BaseModelEvent
{
    public $type = 'deleting';
}
