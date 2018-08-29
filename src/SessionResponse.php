<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/28/2018
 * Time: 1:46 PM
 */

namespace Uzzal\SslCommerz;


class SessionResponse
{
    const STATUS = 'status';
    const FAILURE_REASON = 'failedreason';
    const SESSION_KEY = 'sessionkey';
    const SUPPORTED_GATEWAY = 'gw';
    const GATEWAY_URL = 'GatewayPageURL';
    const AFTER_GATEWAY_URL = 'redirectGatewayURL';
    const STORE_BANNER_URL = 'storeBanner';
    const STORE_LOGO_URL = 'storeLogo';
    const GATEWAY_DESCRIPTION = 'desc';

    private $_trans_id;
    private $_json;
    public function __construct($content)
    {
        $this->_json = json_decode($content, true);
    }

    public function setTransactionId($transaction_id){
        $this->_trans_id = $transaction_id;
    }

    public function getTransactionId(){
        return $this->_trans_id;
    }

    function getStatus()
    {
        return $this->_json[self::STATUS];
    }

    function getFailureReason()
    {
        return $this->_json[self::FAILURE_REASON];
    }

    function getSessionKey()
    {
        return $this->_json[self::SESSION_KEY];
    }

    function getSupportedGateways()
    {
        return $this->_json[self::SUPPORTED_GATEWAY];
    }

    function getGatewayUrl()
    {
        return $this->_json[self::GATEWAY_URL];
    }

    function getAfterGatewayUrl()
    {
        return $this->_json[self::AFTER_GATEWAY_URL];
    }

    function getStoreBanner()
    {
        return $this->_json[self::STORE_BANNER_URL];
    }

    function getStoreLogo()
    {
        return $this->_json[self::STORE_LOGO_URL];
    }

    function getGatewayDescription()
    {
        return $this->_json[self::GATEWAY_DESCRIPTION];
    }

    public function get($key){
        return $this->_json[$key];
    }
}