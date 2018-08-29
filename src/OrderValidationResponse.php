<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/28/2018
 * Time: 3:51 PM
 */

namespace Uzzal\SslCommerz;


class OrderValidationResponse
{
    const STATUS = 'status';
    const TRANSACTION_DATE = 'tran_date';
    const TRANSACTION_ID = 'tran_id';
    const VAL_ID = 'val_id';
    const AMOUNT = 'amount';
    const STORE_AMOUNT = 'store_amount';
    const CARD_TYPE = 'card_type';
    const CARD_NO = 'card_no';
    const CURRENCY = 'currency';
    const BANK_TRANSACTION_ID = 'bank_tran_id';
    const CARD_ISSUER = 'card_issuer';
    const CARD_BRAND = 'card_brand';
    const CARD_ISSUER_COUNTRY = 'card_issuer_country';
    const CARD_ISSUER_COUNTRY_CODE = 'card_issuer_country_code';
    const CURRENCY_TYPE = 'currency_type';
    const CURRENCY_AMOUNT = 'currency_amount';
    const EMI_INSTALLMENT = 'emi_installment';
    const DISCOUNT_PERCENTAGE = 'discount_percentage';
    const DISCOUNT_REMARKS = 'discount_remarks';
    const RISK_TITLE = 'risk_title';

    private $_json;
    public function __construct($content)
    {
        $this->_json = json_decode($content, true);
    }

    public function getStatus(){
        return $this->_json[self::STATUS];
    }

    public function getTransactionId(){
        return $this->_json[self::TRANSACTION_ID];
    }

    public function getAmount(){
        return $this->_json[self::AMOUNT];
    }

    public function getStoreAmount(){
        return $this->_json[self::STORE_AMOUNT];
    }

    public function getCurrency(){
        return $this->_json[self::CURRENCY];
    }

    public function get($key){
        return $this->_json[$key];
    }
}