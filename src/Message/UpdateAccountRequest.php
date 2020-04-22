<?php

namespace Redde\Message;

class UpdateAccountRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();
        $data['name'] = $this->getName();
        $data['legal_name'] = $this->getLegalName();
        $data['entity_type_id'] = $this->getEntityTypeId();
        $data['address_uuid'] = $this->getAddressUuid();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('/account', $data, 'PATCH');

        return $this->response = new Response($this, $httpResponse->getBody()->getContents());
    }

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

    public function getEntityTypeId()
    {
        return $this->getParameter('entity_type_id');
    }

    public function setEntityTypeId($value)
    {
        return $this->setParameter('entity_type_id', $value);
    }

    public function getAddressUuid()
    {
        return $this->getParameter('address_uuid');
    }

    public function setAddressUuid($value)
    {
        return $this->setParameter('address_uuid', $value);
    }
}
