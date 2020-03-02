<?php

namespace App\Exception;

class IncorrectPasswordException extends \Exception
{
    public function __construct()
    {
        parent::__construct('The password is incorrect.',400);
    }
}
