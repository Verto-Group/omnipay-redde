<?php

namespace Omnipay\Redde\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();
        $this->validate('amount', 'description');
        $data['amount'] = $this->getAmountInteger();
        $data['currency'] = strtolower($this->getCurrency());
        $data['description'] = $this->getDescription();
        $data['ip_address'] = $this->getClientIp();
        $data['capture'] = $this->getCapture();
        $token = $this->getCardReference();

        if (empty($token)) {
            $token = $this->getToken();
        }

        if (!empty($token)) {

            if (strpos($token, 'card_') !== false) {
                $data['card_token'] = $token;
            } else {
                $data['account_token'] = $token;
            }

            if ($this->getEmail()) {
                $data['email'] = $this->getEmail();
            }

        } else {
            $this->validate('card');
            $this->getCard()->validate();

            if ($this->getCard()->getEmail()) {
                $data['email'] = $this->getCard()->getEmail();
            } elseif ($this->getEmail()) {
                $data['email'] = $this->getEmail();
            } else {
                $this->validate('email');
            }

            $data['card']['number'] = $this->getCard()->getNumber();
            $data['card']['expiry_month'] = $this->getCard()->getExpiryMonth();
            $data['card']['expiry_year'] = $this->getCard()->getExpiryYear();
            $data['card']['cvc'] = $this->getCard()->getCvv();
            $data['card']['name'] = $this->getCard()->getName();
            $data['card']['address_line1'] = $this->getCard()->getAddress1();
            $data['card']['address_line2'] = $this->getCard()->getAddress2();
            $data['card']['address_city'] = $this->getCard()->getCity();
            $data['card']['address_postcode'] = $this->getCard()->getPostcode();
            $data['card']['address_state'] = $this->getCard()->getState();
            $data['card']['address_country'] = $this->getCard()->getCountry();
        }

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('/charges', $data);

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
