<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/28/2018
 * Time: 1:11 PM
 */

namespace Uzzal\SslCommerz\Exceptions;


use Throwable;

class RequestParameterMissingException extends \Exception
{
    public function __construct(string $message = "Some required fields are missing, use getErrors() to see the missing fields", int $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}