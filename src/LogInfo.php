<?php


namespace Sco\ActionLog;

use Sco\Attributes\HasAttributesTrait;

class LogInfo
{
    use HasAttributesTrait;

    public function __construct(array $attributes)
    {
        $this->setAttribute($attributes);
    }

    public function getUserId()
    {
        return $this->getAttribute('user_id');
    }

    public function getContent()
    {
        return $this->getAttribute('content');
    }

    public function getType()
    {
        return $this->getAttribute('type');
    }

    public function getClientIp()
    {
        return $this->getAttribute('client_ip');
    }

    public function getClient()
    {
        return $this->getAttribute('client');
    }
}
