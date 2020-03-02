<?php

namespace App\Exception;

class RequiredFieldsException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Please fill in all the required fields.',400);
    }
}
