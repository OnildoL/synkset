<?php

namespace src\application\entities\errors;

use Exception;

class UserException extends Exception
{
    public function __construct($message = "User error.")
    {
        parent::__construct($message);
    }
}
