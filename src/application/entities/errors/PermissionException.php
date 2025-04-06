<?php

namespace src\application\entities\errors;

use Exception;

class PermissionException extends Exception
{
    public function __construct($message = "Permission error.")
    {
        parent::__construct($message);
    }
}
