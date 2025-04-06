<?php

namespace src\application\entities\errors;

use Exception;

class ProfileException extends Exception
{
    public function __construct($message = "Profile error.")
    {
        parent::__construct($message);
    }
}
