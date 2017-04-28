<?php


namespace Sco\ActionLog\Events;

class ModelWasCreated extends AbstractEvent
{
    protected $type = 'created';

    public function getContent()
    {
        return $this->getAttribute('model.attributes');
    }
}
