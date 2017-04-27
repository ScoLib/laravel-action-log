<?php


namespace Sco\ActionLog\Events;

use Auth;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractEvent
{

    public $model;

    public $log;

    public $type;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->setLogValue();
    }

    public function getContent()
    {
        return [
            'from' => $this->model->getOriginal(),
            'to'   => $this->model->getAttributes(),
        ];
    }

    /**
     * Set action log value
     */
    private function setLogValue()
    {
        $this->log = [
            'user_id' => Auth::id(),
            'ip'      => request()->getClientIp(),
        ];
    }

    /**
     * Get log value
     *
     * @param null|string $key
     * @param mixed       $default
     *
     * @return mixed
     */
    public function getLogValue($key = null, $default = null)
    {
        if (is_null($key)) {
            return $this->log;
        }

        return isset($this->log[$key]) ? $this->log[$key] : $default;
    }
}
