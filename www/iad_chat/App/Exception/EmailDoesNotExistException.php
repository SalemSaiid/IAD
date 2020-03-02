<?php

namespace App\Exception;

class EmailDoesNotExistException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Email address does not exist in database.',400);
    }
}
