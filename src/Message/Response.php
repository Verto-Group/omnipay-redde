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

    public function getData()
    {
        return $this->data;
    }

    public function isSuccessful()
    {
        //
    }
}
