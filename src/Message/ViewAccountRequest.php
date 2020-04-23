<?php

namespace Redde\OmnipayRedde\Message;

class ViewAccountRequest extends AbstractRequest
{
    public function getData()
    {
        //
    }

    public function sendData($data = null)
    {
        $httpResponse = $this->sendRequest('/account', null, 'POST');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
