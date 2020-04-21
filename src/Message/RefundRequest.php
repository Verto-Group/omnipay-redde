<?php

namespace Omnipay\Redde\Message;

class RefundRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transaction_uuid', 'amount', 'card_uuid');
        $data = array();
        $data['transaction_uuid'] = $this->getTransactionUuid();
        $data['amount'] = $this->getAmountInteger();
        $data['card_uuid'] = $this->getCardUuid();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest( '/refunds', $data, 'PUT');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
