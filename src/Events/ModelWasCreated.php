<?php


namespace Sco\ActionLog\Events;

class ModelWasCreated extends AbstractEvent
{
    public $type = 'created';

    public function getContent()
    {
        return $this->getAttribute('model.attributes');
    }
}
