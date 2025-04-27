<?php

namespace src\application\entities\errors;

use Exception;

class ProductException extends Exception
{
    public function __construct($message = "Product error.")
    {
        parent::__construct($message);
    }
}
