<?php


namespace Sco\ActionLog\Events;

use Auth;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractEvent
{
    public $model;

    public $userId;

    public $type;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->userId = Auth::id();
    }
}
