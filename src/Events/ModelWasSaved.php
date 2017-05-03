<?php


namespace Sco\ActionLog\Events;

class ModelWasSaved extends BaseModelEvent
{
    public $type = 'saved';
}
