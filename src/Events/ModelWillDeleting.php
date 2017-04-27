<?php


namespace Sco\ActionLog\Events;

class ModelWillDeleting extends AbstractEvent
{
    public $type = 'deleting';
}
