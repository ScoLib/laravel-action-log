<?php


namespace Sco\ActionLog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Sco\ActionLog\Models\ActionLog
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id 操作者ID
 * @property string $type 操作类型
 * @property string $content 操作描述
 * @property string $ip 操作者IP
 * @property \Carbon\Carbon $created_at 操作时间
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLog whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLog whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLog whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLog whereUserId($value)
 */
class ActionLog extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('actionlog.table_name');
    }
}