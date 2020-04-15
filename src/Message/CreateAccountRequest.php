<?php

namespace Omnipay\Redde\Message;

class CreateAccountRequest extends AbstractRequest
{
    public function getName()
    {
        return $this->getParameter('name');
    }

    public function setName($value)
    {
        return $this->setParameter('name', $value);
    }

    public function getLegalName()
    {
        return $this->getParameter('legal_name');
    }

    public function setLegalName($value)
    {
        return $this->setParameter('legal_name', $value);
    }

    public function getAddress()
    {
        return $this->getParameter('address');
    }

    public function setAddress($value)
    {
        return $this->setParameter('address', $value);
    }

    public function getAccountIdentity()
    {
        return $this->getParameter('account_identity');
    }

    public function setAccountIdentity($value)
    {
        return $this->setParameter('account_identity', $value);
    }

    public function getData()
    {
        $this->validate('email');

        $data = array();

        $data['email'] = $this->getEmail();
        $data['name'] = $this->getName();
        $data['legal_name'] = $this->getLegalName();
        $data['entity_type'] = $this->getEntityType();
        $data['account_identity'] = $this->getAccountIdentity();

        if ($this->getToken()) {
            $data['card_token'] = $this->getToken(); 
        } else {
            $card = $this->getCard();
            $card->validate();
            $data['card']['number'] = $card->getNumber();
            $data['card']['expiry_month'] = $card->getExpiryMonth();
            $data['card']['expiry_year'] = $card->getExpiryYear();
            $data['card']['cvc'] = $card->getCvv();
            $data['card']['name'] = $card->getName();
            $data['card']['address_line1'] = $card->getAddress1();
            $data['card']['address_line2'] = $card->getAddress2();
            $data['card']['address_city'] = $card->getCity();
            $data['card']['address_postcode'] = $card->getPostcode();
            $data['card']['address_state'] = $card->getState();
            $data['card']['address_country'] = $card->getCountry();
        }

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('/accounts', $data);

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }
}
