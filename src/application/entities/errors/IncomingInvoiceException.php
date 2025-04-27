<?php

namespace src\application\entities\errors;

use Exception;

class IncomingInvoiceException extends Exception
{
    public function __construct($message = "Incoming invoice error.")
    {
        parent::__construct($message);
    }
}
