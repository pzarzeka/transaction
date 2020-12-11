<?php

namespace App\Exceptions;

use Exception;

class BadContentTypeException extends Exception
{

    protected $message = 'Specified content type not allowed';

    protected $code = 415;

}
