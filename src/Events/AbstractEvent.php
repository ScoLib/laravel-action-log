<?php


namespace Sco\ActionLog\Events;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

abstract class AbstractEvent
{
    protected $attributes = [];

    protected $type;

    public function __construct(Model $model)
    {
        $this->setAttribute([
            'model.original'   => $model->getOriginal(),
            'model.attributes' => $model->getAttributes(),
            'model.table'      => $model->getTable(),
            'user_id'          => intval(Auth::id()),
            'client_ip'        => request()->getClientIp(),
            'type'             => $this->type,
        ]);

        if (class_exists('\Jenssegers\Agent\Agent')) {
            $agent = new \Jenssegers\Agent\Agent();

            $device = $agent->device();
            $platform = $agent->platform();
            $browser = $agent->browser();

            $this->setAttribute('client', [
                'device' =>   $device . ' ' . $agent->version($device),
                'platform' => $platform . ' ' . $agent->version($platform),
                '$browser' => $browser . ' ' . $agent->version($browser),
            ]);
        }

    }

    public function getContent()
    {
        return [
            'from' => $this->getAttribute('model.original'),
            'to'   => $this->getAttribute('model.attributes'),
        ];
    }

    /**
     * Set a given log value.
     *
     * @param array|string $key
     * @param mixed        $value
     */
    private function setAttribute($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->attributes, $key, $value);
        }
    }

    /**
     * Get the specified log value.
     *
     * @param null|string $key
     * @param mixed       $default
     *
     * @return mixed
     */
    public function getAttribute($key = null, $default = null)
    {
        return Arr::get($this->attributes, $key, $default);
    }
}
