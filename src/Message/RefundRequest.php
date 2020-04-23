<?php

namespace Redde\OmnipayRedde\Message;

class RefundRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transaction_uuid', 'amount');
        $data = array();
        $data['transaction_uuid'] = $this->getTransactionUuid();
        $data['amount'] = $this->getAmountInteger();
        $data['description'] = $this->getDescription();
        $data['card_uuid'] = $this->getCardUuid();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest( '/refunds', $data, 'PUT');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }

    public function getCardUuid()
    {
        return $this->getParameter('card_uuid');
    }

    public function setCardUuid($value)
    {
        return $this->setParameter('card_uuid', $value);
    }
}
