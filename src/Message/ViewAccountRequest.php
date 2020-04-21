<?php

namespace Omnipay\Redde\Message;

class ViewAccountRequest extends AbstractRequest
{
    public function send()
    {
        $httpResponse = $this->sendRequest('/account', 'POST');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}