<?php

namespace src\application\entities\errors;

use Exception;

class SupplierException extends Exception
{
    public function __construct($message = "Supplier error.")
    {
        parent::__construct($message);
    }
}
