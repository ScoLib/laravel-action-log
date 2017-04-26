<?php


namespace Sco\ActionLog\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;

abstract class ActionLogEvent
{
    use SerializesModels;

    public $model;

    public $type;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
