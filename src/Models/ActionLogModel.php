<?php


namespace Sco\ActionLog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Sco\ActionLog\Models\ActionLogModel
 *
 * @property int $id
 * @property int $user_id 操作者ID
 * @property string $type 操作类型
 * @property string $content 操作描述
 * @property string $client_ip 操作者IP
 * @property string $client 客户端信息
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Sco\Admin\Models\Manager $user
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereClient($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereClientIp($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Sco\ActionLog\Models\ActionLogModel whereId($value)
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
        $this->table = config('actionlog.action_logs_table');
    }

    public function user()
    {
        return $this->belongsTo(config('actionlog.user'), config('actionlog.user_foreign_key'));
    }
}
