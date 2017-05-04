<?php


namespace Sco\ActionLog\Events;

class ManualEvent extends AbstractEvent
{
    protected $content;

    public function __construct($type, $content)
    {
        $this->type    = $type;
        $this->content = $content;

        parent::__construct();
    }

    protected function getContent()
    {
        return $this->content;
    }
}
