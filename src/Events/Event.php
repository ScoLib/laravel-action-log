<?php


namespace Sco\ActionLog\Events;

use Auth;
use Request;
use Sco\ActionLog\LogInfo;

abstract class Event implements EventInterface
{
    protected $type;

    /**
     * @var \Sco\ActionLog\LogInfo
     */
    public $logInfo;

    abstract protected function getContent();

    public function __construct()
    {
        $this->setLogInfo();
    }

    protected function getType()
    {
        return $this->type;
    }

    protected function getClient()
    {
        if (class_exists('\Jenssegers\Agent\Agent')) {
            $agent = new \Jenssegers\Agent\Agent();

            $platform = $agent->platform();
            $browser  = $agent->browser();

            return [
                'device'   => $agent->device(),
                'platform' => $platform . ' ' . $agent->version($platform),
                'browser'  => $browser . ' ' . $agent->version($browser),
            ];
        }

        return [
            'agent' => Request::header('User-Agent'),
        ];
    }

    protected function setLogInfo()
    {
        $this->logInfo = new LogInfo([
            'type'      => $this->getType(),
            'content'   => $this->getContent(),
            'client_ip' => Request::getClientIp(),
            'client'    => $this->getClient(),
            'user_id'   => intval(Auth::id()),
        ]);

        return $this->logInfo;
    }

    /**
     * @return \Sco\ActionLog\LogInfo
     */
    public function getLogInfo()
    {
        return $this->logInfo;
    }
}
