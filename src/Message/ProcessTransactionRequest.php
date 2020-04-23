<?php

namespace Redde\OmnipayRedde\Message;

class ProcessTransactionRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();
        $this->validate('amount', 'token', 'clientIp', 'card');
        $data['token'] = $this->getToken();
        $data['email'] = $this->getEmail();
        $data['description'] = $this->getDescription();
        $data['amount'] = $this->getAmount();
        $data['ip_address'] = $this->getClientIp();
        $data['capture'] = $this->getCapture();
        $data['card'] = $this->getCard();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('/transactions', $data, 'PUT');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }

    public function getCapture()
    {
        $capture = $this->getParameter('capture');

        return $capture === false ? 'false' : 'true';
    }

    public function setCapture($value)
    {
        return $this->setParameter('capture', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getCard()
    {
        return $this->getParameter('card');
    }

    public function setCard($value)
    {
        return $this->setParameter('card', $value);
    }
}
