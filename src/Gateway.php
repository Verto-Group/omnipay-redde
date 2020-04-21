<?php

namespace Omnipay\Redde;

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

    public function precessTansaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\ProcessTransactionRequest', $parameters);
    }

    public function viewTansaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\ViewTransactionRequest', $parameters);
    }

    public function viewSettlement(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\ViewSettlementRequest', $parameters);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\AuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\CaptureRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\RefundRequest', $parameters);
    }

    public function viewAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\ViewAccountRequest', $parameters);
    }

    public function updateAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\UpdateAccountRequest', $parameters);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Redde\Message\CreateCardRequest', $parameters);
    }
}
