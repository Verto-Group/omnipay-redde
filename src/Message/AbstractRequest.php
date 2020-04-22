<?php

namespace Redde\OmnipayRedde\Message;

use Guzzle\Http\Message\RequestInterface;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $testEndpoint = 'redde.test/api/';  //input api here
    protected $liveEndpoint = '';  //input api here

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getTransactionUuid()
    {
        return $this->getParameter('transaction_uuid');
    }

    public function setTransactionUuid($value)
    {
        return $this->setParameter('transaction_uuid', $value);
    }

    public function getCardUuid()
    {
        return $this->getParameter('card_uuid');
    }

    public function setCardUuid($value)
    {
        return $this->setParameter('card_uuid', $value);
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    public function sendRequest($action, $data = null, $method = 'POST')
    {
        $body = $data ? http_build_query($data) : null;

        return $this->httpClient->request(
            $method,
            $this->getEndpoint() . $action,
            array('Authorization' => 'Basic ' . base64_encode($this->getSecretKey() . ':')),
            $body
        );
    }

    protected function getBaseData()
    {
        return [
            'transaction_id' => $this->getTransactionId(),
            'expire_date' => $this->getCard()->getExpiryDate('mY'),
            'start_date' => $this->getCard()->getStartDate('mY'),
        ];
    }
}
