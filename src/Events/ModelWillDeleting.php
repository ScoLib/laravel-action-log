<?php


namespace Sco\ActionLog\Events;

class ModelWillDeleting extends AbstractEvent
{
    public $type = 'deleting';

    public function getContent()
    {
        return $this->getAttribute('model.original');
    }
}
