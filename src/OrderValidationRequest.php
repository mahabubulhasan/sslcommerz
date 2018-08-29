<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/28/2018
 * Time: 3:44 PM
 */

namespace Uzzal\SslCommerz;


use Uzzal\SslCommerz\Contracts\OrderValidationRequestInterface;
use Uzzal\SslCommerz\Traits\RequestValidatorTrait;

class OrderValidationRequest implements OrderValidationRequestInterface
{
    use RequestValidatorTrait;

    private $_required=[
        self::VAL_ID,
        self::STORE_ID,
        self::STORE_PASSWORD
    ];
    private $_errors=[];
    private $_fields=[];
    private $_validated = false;

    public function __construct(array $fields)
    {
        $this->_fields = $fields;
    }

    public function getApiUrl($isSandbox = false)
    {
        if($isSandbox){
            return 'https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php';
        }else{
            return 'https://securepay.sslcommerz.com/validator/api/validationserverAPI.php';
        }
    }

    function send($isSandbox=false)
    {
        $client = new \GuzzleHttp\Client();
        $param = '?';
        foreach($this->values() as $k=>$v){
            $param.=$k.'='.$v.'&';
        }
        $param .= 'v=1&format=json';
        $resp = $client->get($this->getApiUrl($isSandbox).$param);
        return new OrderValidationResponse($resp->getBody()->getContents());
    }

}