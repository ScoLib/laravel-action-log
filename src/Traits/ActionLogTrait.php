<?php


namespace Sco\ActionLog\Traits;

use Illuminate\Database\Eloquent\Model;

trait ActionLogTrait
{
    public static function bootActionLogTrait()
    {
        static::saved(function (Model $model) {
        });
    }
}
