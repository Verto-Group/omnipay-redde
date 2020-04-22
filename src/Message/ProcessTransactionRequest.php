<?php

namespace Redde\Message;

class ProcessTransactionRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();
        $this->validate('amount', 'token', 'currency', 'ip_address', 'capture');
        $data['token'] = $this->getToken();
        $data['card_uuid'] = $this->getCardUuid();
        $data['email'] = $this->getEmail();
        $data['description'] = $this->getDescription();
        $data['amount'] = $this->getAmountInteger();
        $data['ip_address'] = $this->getClientIp();

        $data['currency'] = strtolower($this->getCurrency());
        $data['capture'] = $this->getCapture();

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
}
