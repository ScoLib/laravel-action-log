<?php


namespace Sco\ActionLog\Handlers;

abstract class AbstractHandler implements HandlerInterface
{
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
            'agent' => request()->server('HTTP_USER_AGENT'),
        ];
    }
}
