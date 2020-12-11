<?php

namespace App\Exceptions;

use Exception;

class AccountDoesntExistException extends Exception
{
    protected $message = 'Account doesn\'t exist.';

    protected $code = 500;
}
