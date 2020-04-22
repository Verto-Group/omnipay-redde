<?php

namespace Redde\OmnipayRedde\Message;

class ViewTransactionRequest extends AbstractRequest
{
    public function send()
    {
        $httpResponse = $this->sendRequest('/transactions', 'GET');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
