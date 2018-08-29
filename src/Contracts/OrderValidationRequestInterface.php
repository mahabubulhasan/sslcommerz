<?php
/**
 * Created by PhpStorm.
 * User: Mahabubul Hasan
 * Date: 8/28/2018
 * Time: 12:42 PM
 */

namespace Uzzal\SslCommerz\Contracts;


interface OrderValidationRequestInterface extends RequestInterface
{
    const VAL_ID = 'val_id';
    const STORE_ID = 'store_id';
    const STORE_PASSWORD = 'store_passwd';
}