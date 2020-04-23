<?php

namespace Redde\OmnipayRedde;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Redde';
    }

    public function getDefaultParameters()
    {
        return array(
            'secretKey' => '',
            'testMode' => false,
        );
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function processTransaction(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\ProcessTransactionRequest', $parameters);
    }

    public function viewTransaction(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\ViewTransactionRequest', $parameters);
    }

    public function viewSettlement(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\ViewSettlementRequest', $parameters);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\AuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\CaptureRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\RefundRequest', $parameters);
    }

    public function viewAccount(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\ViewAccountRequest', $parameters);
    }

    public function updateAccount(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\UpdateAccountRequest', $parameters);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('Redde\OmnipayRedde\Message\CreateCardRequest', $parameters);
    }
}
