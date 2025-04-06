<?php

namespace src\application\entities\errors;

use Exception;

class CompanyException extends Exception
{
    public function __construct($message = "Company error.")
    {
        parent::__construct($message);
    }
}
