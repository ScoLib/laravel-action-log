<?php


namespace Sco\ActionLog\Events;

class ModelWasDeleted extends AbstractEvent
{
    public $type = 'deleted';

    public function getContent()
    {
        return $this->getAttribute('model.attributes');
    }
}
