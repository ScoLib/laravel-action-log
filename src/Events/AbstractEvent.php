<?php


namespace Sco\ActionLog\Events;

use Illuminate\Database\Eloquent\Model;
use Sco\ActionLog\Handlers\EventHandler;
use Sco\ActionLog\Traits\HasAttributes;

abstract class AbstractEvent
{
    use HasAttributes;

    public $type;

    public $logInfo;

    public function __construct(Model $model)
    {
        $this->setAttribute([
            'model.original'   => $model->getOriginal(),
            'model.attributes' => $model->getAttributes(),
        ]);

        $handler = new EventHandler($this, $model);

        $this->logInfo = $handler->info();
    }

    public function getContent()
    {
        return [
            'from' => $this->getAttribute('model.original'),
            'to'   => $this->getAttribute('model.attributes'),
        ];
    }


}
