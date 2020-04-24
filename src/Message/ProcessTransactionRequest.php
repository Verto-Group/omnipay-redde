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
        $data['card_token'] = $this->getCardToken();

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

    public function getCardToken()
    {
        return $this->getParameter('card_token');
    }

    public function setCardToken($value)
    {
        return $this->setParameter('card_token', $value);
    }
}
