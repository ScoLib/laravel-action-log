<?php


namespace Sco\ActionLog\Events;

class ModelWillCreating extends AbstractEvent
{
    public $type = 'creating';

    public function getContent()
    {
        return $this->getAttribute('model.attributes');
    }
}
