<?php

namespace Omnipay\Redde\Message;

class CreateCardRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();
        $card = $this->getCard();
        $card->validate();
        $data['number'] = $card->getNumber();
        $data['expiry_month'] = $card->getExpiryMonth();
        $data['expiry_year'] = $card->getExpiryYear();
        $data['cvc'] = $card->getCvv();
        $data['name'] = $card->getName();
        $data['address_line1'] = $card->getAddress1();
        $data['address_line2'] = $card->getAddress2();
        $data['address_city'] = $card->getCity();
        $data['address_postcode'] = $card->getPostcode();
        $data['address_state'] = $card->getState();
        $data['address_country'] = $card->getCountry();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('/cards', $data);

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
