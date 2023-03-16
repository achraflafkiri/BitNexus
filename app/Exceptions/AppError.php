<?php

namespace App\Exceptions;

use Exception;

class AppError extends Exception
{
    protected $statusCode;
    protected $message;
    protected $code;

    public function __construct($message = null, $code = null, $statusCode = 400)
    {
        parent::__construct($message, $code);
        $this->statusCode = $statusCode;
        $this->message = $message ?: 'An error occurred';
        $this->code = $code ?: 0;
    }

    public function getStatusCode ()
    {
        return $this->statusCode;
    }
}
