<?php


namespace Sco\ActionLog\Events;

class ModelWasSaved extends AbstractEvent
{
    public $type = 'saved';
}
