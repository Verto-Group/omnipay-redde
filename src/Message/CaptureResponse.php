<?php

namespace Redde\Message;

class CaptureResponse extends Response
{
    public function getCaptured()
    {
        if (isset($this->data['response']['captured'])) {
            return $this->data['response']['captured'];
        }
    }
}
