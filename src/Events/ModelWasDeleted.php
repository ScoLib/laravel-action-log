<?php


namespace Sco\ActionLog\Events;

class ModelWasDeleted extends AbstractEvent
{
    protected $type = 'deleted';

    public function getContent()
    {
        return $this->getAttribute('model.attributes');
    }
}
