<?php

namespace Omnipay\Redde\Message;

use Guzzle\Http\Message\RequestInterface;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transaction_uuid');
        $amount = $this->getAmountInteger();

        return $amount ? array('amount' => $amount) : array();
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest(
            '/transactions/' . $this->getTransactionUuid() . '/capture',
            $data,
            'PATCH'
        );
        
        return $this->response = new CaptureResponse($this, $httpResponse->getBody()->getContents());
    }
}
