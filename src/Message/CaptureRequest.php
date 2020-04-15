<?php

namespace Omnipay\Redde\Message;

use Guzzle\Http\Message\RequestInterface;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transactionReference');
        $amount = $this->getAmountInteger();

        return $amount ? array('amount' => $amount) : array();
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest(
            '/charges/' . $this->getTransactionReference() . '/capture',
            $data,
            'PUT'
        );
        
        return $this->response = new CaptureResponse($this, $httpResponse->getBody()->getContents());
    }
}