<?php

namespace Redde\Message;

class AuthorizeRequest extends ProcessTransactionRequest
{
    public function getData()
    {
        $this->validate('amount', 'card');
        $this->getCard()->validate();
        $data = $this->getBaseData();
        
        return $data;
    }

    public function getCapture()
    {
        $capture = $this->getParameter('capture');

        return $capture === true ? 'true' : 'false';
    }
}
