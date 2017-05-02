<?php


namespace Sco\ActionLog\Handlers;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Sco\ActionLog\Events\AbstractEvent;
use Sco\ActionLog\LogInfo;

class EventHandler extends AbstractHandler
{
    private $event;
    private $model;

    public function __construct(AbstractEvent $event, Model $model)
    {
        $this->event = $event;
        $this->model = $model;
    }

    public function info()
    {
        return new LogInfo([
            'type'       => $this->event->type,
            'table_name' => $this->model->getTable(),
            'content'    => $this->event->getContent(),
            'client_ip'  => request()->getClientIp(),
            'client'     => $this->getClient(),
            'user_id'    => intval(Auth::id()),
        ]);
    }
}
