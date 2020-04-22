<?php

namespace Redde\OmnipayRedde\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data, $decode = true)
    {
        parent::__construct($request, $data);

        if ($decode) {
            $this->data = json_decode($data, true);
        }
    }

    public function isSuccessful()
    {
        return !isset($this->data['error']);
    }

    public function getTransactionReference()
    {
        if (isset($this->data['response']['token'])) {
            return $this->data['response']['token'];
        }
    }

    public function getCardReference()
    {
        if (isset($this->data['response']['token'])) {
            return $this->data['response']['token'];
        }
    }

    public function getCardToken()
    {
        return $this->getCardReference();
    }

    public function getAccountReference()
    {
        if (isset($this->data['response']['token'])) {
            return $this->data['response']['token'];
        }
    }

    public function getAccountToken()
    {
        return $this->getAccountReference();
    }

    public function getMessage()
    {
        if ($this->isSuccessful()) {

            if (isset($this->data['response']['status_message'])) {
                return $this->data['response']['status_message'];
            } else {
                return true;
            }

        } else {
            return $this->data['error_description'];
        }
    }

    public function getCode()
    {
        if (isset($this->data['error'])) {
            return $this->data['error'];
        }
    }
}
