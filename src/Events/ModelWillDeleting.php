<?php


namespace Sco\ActionLog\Events;

class ModelWillDeleting extends AbstractEvent
{
    protected $type = 'deleting';

    public function getContent()
    {
        return $this->getAttribute('model.original');
    }
}
