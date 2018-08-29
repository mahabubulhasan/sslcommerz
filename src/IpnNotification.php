<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/29/2018
 * Time: 3:10 PM
 */

namespace Uzzal\SslCommerz;


class IpnNotification
{
    const STATUS = 'status';
    const TRAN_ID = 'tran_id';
    const STORE_ID = 'store_id';
    const VAL_ID = 'val_id';
    const AMOUNT = 'amount';
    const CARD_TYPE = 'card_type';
    const STORE_AMOUNT = 'store_amount';
    const CARD_NO = 'card_no';
    const BANK_TRAN_ID = 'bank_tran_id';
    const TRAN_DATE = 'tran_date';
    const CURRENCY = 'currency';
    const CARD_ISSUER = 'card_issuer';
    const CARD_BRAND = 'card_brand';
    const CARD_ISSUER_COUNTRY = 'card_issuer_country';
    const CARD_ISSUER_COUNTRY_CODE = 'card_issuer_country_code';
    const VERIFY_SIGN = 'verify_sign';
    const VERIFY_KEY = 'verify_key';
    const CUS_FAX = 'cus_fax';
    const CURRENCY_TYPE = 'currency_type';
    const CURRENCY_AMOUNT = 'currency_amount';
    const CURRENCY_RATE = 'currency_rate';
    const BASE_FAIR = 'base_fair';
    const RISK_LEVEL = 'risk_level';
    const RISK_TITLE = 'risk_title';
    const VALUE_A = 'value_a';
    const VALUE_B = 'value_b';
    const VALUE_C = 'value_c';
    const VALUE_D = 'value_d';

    private $_ipn_vals = [];
    public function __construct($post=[])
    {
        if(count($post)==0){
            $this->_ipn_vals = $post;
        }else{
            $this->_ipn_vals = $_POST;
        }

    }

    public function get($key){
        return $this->_ipn_vals[$key];
    }

    public function getValId(){
        return $this->_ipn_vals[self::VAL_ID];
    }

    public function getTransactionId(){
        return $this->_ipn_vals[self::TRAN_ID];
    }

    public function getAmount(){
        return $this->_ipn_vals[self::AMOUNT];
    }
}