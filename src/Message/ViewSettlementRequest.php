<?php

namespace Redde\OmnipayRedde\Message;

class ViewSettlementRequest extends AbstractRequest
{
    public function getData()
    {
        //
    }

    public function sendData($data = null)
    {
        $httpResponse = $this->sendRequest('/settlements', null, 'GET');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
