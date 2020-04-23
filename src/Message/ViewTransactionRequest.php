<?php

namespace Redde\OmnipayRedde\Message;

class ViewTransactionRequest extends AbstractRequest
{
    public function getData()
    {
        //
    }

    public function sendData($data = null)
    {
        $httpResponse = $this->sendRequest('/transactions', null, 'GET');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
