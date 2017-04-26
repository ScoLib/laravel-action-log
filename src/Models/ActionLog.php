<?php


namespace Sco\ActionLog\Models;


use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('actionlog.table_name');
    }
}
