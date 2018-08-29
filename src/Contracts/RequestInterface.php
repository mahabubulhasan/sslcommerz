<?php
/**
 * Created by PhpStorm.
 * User: Mahabubul Hasan
 * Date: 8/28/2018
 * Time: 12:41 PM
 */

namespace Uzzal\SslCommerz\Contracts;


interface RequestInterface
{
    function isValid();
    function getErrors();
    function values();
    function getApiUrl($isSandbox=false);
    function send($isSandbox=false);
}