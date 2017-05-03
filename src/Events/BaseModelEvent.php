<?php


namespace Sco\ActionLog\Events;

use Illuminate\Database\Eloquent\Model;
use Sco\ActionLog\Handlers\EventHandler;
use Sco\ActionLog\Traits\HasAttributes;

class BaseModelEvent extends AbstractEvent
{
    use HasAttributes;

    public function __construct(Model $model)
    {
        $this->setAttribute([
            'model.table'      => $model->getTable(),
            'model.original'   => $model->getOriginal(),
            'model.attributes' => $model->getAttributes(),
        ]);

        parent::__construct();
    }

    protected function getContent()
    {
        return [
            'table'      => $this->getAttribute('model.table', ''),
            'original'   => $this->getAttribute('model.original', []),
            'attributes' => $this->getAttribute('model.attributes', []),
        ];
    }
}
