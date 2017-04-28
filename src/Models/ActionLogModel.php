<?php


namespace Sco\ActionLog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Sco\ActionLog\Models\ActionLog
 *
 * @property int $id
 * @property int $user_id 操作者ID
 * @property string $type 操作类型
 * @property string $table_name 相关的数据表
 * @property string $content 操作描述
 * @property string $client_ip 操作者IP
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereClientIp($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereTableName($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereUserId($value)
 * @mixin \Eloquent
 */
class ActionLogModel extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('actionlog.table_name');
    }
}
