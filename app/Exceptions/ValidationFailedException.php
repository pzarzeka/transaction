<?php

namespace App\Exceptions;

use Exception;

class ValidationFailedException extends Exception
{
    protected $message = 'Mandatory body parameters missing or have incorrect type';

    protected $code = 400;
}
