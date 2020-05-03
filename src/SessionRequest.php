<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/28/2018
 * Time: 12:58 PM
 */

namespace Uzzal\SslCommerz;


use Uzzal\SslCommerz\Contracts\SessionRequestInterface;
use Uzzal\SslCommerz\Exceptions\RequestParameterMissingException;
use Uzzal\SslCommerz\Traits\RequestValidatorTrait;

class SessionRequest implements SessionRequestInterface
{
    use RequestValidatorTrait;

    private $_required=[
        self::STORE_ID,
        self::STORE_PASSWORD,
        self::TOTAL_AMOUNT,
        self::CURRENCY,
        self::TRANSACTION_ID,
        self::SUCCESS_URL,
        self::FAIL_URL,
        self::CANCEL_URL,
        self::EMI,
        self::CUSTOMER_NAME,
        self::CUSTOMER_EMAIL,
        self::CUSTOMER_PHONE,
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
            return 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php';
        }else{
            return 'https://securepay.sslcommerz.com/gwprocess/v3/api.php';
        }
    }

    /**
     * @param bool $isSandbox
     * @return SessionResponse
     * @throws RequestParameterMissingException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function send($isSandbox=false)
    {
        $client = new \GuzzleHttp\Client();
        $resp = $client->request('POST', $this->getApiUrl($isSandbox), ['form_params'=> $this->values()]);
        return new SessionResponse($resp->getBody()->getContents());
    }


}