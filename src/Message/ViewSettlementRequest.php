<?php

namespace Omnipay\Redde\Message;

class ViewSettlementRequest extends AbstractRequest
{
    public function send()
    {
        $httpResponse = $this->sendRequest('/settlements', 'GET');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
