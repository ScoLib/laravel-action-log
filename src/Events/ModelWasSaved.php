<?php


namespace Sco\ActionLog\Events;

class ModelWasSaved extends AbstractEvent
{
    protected $type = 'saved';
}
