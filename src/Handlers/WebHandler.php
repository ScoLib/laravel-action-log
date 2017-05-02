<?php


namespace Sco\ActionLog\Handlers;

use Auth;
use Sco\ActionLog\LogInfo;
use Sco\ActionLog\Traits\HasAttributes;

class WebHandler extends AbstractHandler
{
    use HasAttributes;

    public function __construct(array $attributes)
    {
        $this->setAttribute($attributes);
    }

    public function info()
    {
        return new LogInfo([
            'type'       => $this->getAttribute('type', 'web'),
            'table_name' => $this->getAttribute('table_name', ''),
            'content'    => $this->getAttribute('content', ''),
            'client_ip'  => request()->getClientIp(),
            'client'     => $this->getClient(),
            'user_id'    => intval(Auth::id()),
        ]);
    }
}
