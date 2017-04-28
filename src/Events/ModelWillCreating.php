<?php


namespace Sco\ActionLog\Events;

class ModelWillCreating extends AbstractEvent
{
    protected $type = 'creating';

    public function getContent()
    {
        return $this->getAttribute('model.attributes');
    }
}
