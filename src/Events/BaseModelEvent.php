<?php


namespace Sco\ActionLog\Events;

use Illuminate\Database\Eloquent\Model;
use Sco\Attributes\HasAttributesTrait;

class BaseModelEvent extends AbstractEvent
{
    use HasAttributesTrait;

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
