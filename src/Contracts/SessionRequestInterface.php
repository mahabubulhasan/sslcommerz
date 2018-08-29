<?php
/**
 * Created by PhpStorm.
 * User: Mahabubul Hasan
 * Date: 8/28/2018
 * Time: 12:41 PM
 */

namespace Uzzal\SslCommerz\Contracts;


interface SessionRequestInterface extends RequestInterface
{
    const STORE_ID = 'store_id';
    const STORE_PASSWORD = 'store_passwd';
    const TOTAL_AMOUNT = 'total_amount';
    const CURRENCY = 'currency';
    const TRANSACTION_ID = 'tran_id';
    const SUCCESS_URL = 'success_url';
    const FAIL_URL = 'fail_url';
    const CANCEL_URL = 'cancel_url';
    const ACCEPTABLE_CARDS = 'multi_card_name';
    const EMI = 'emi_option';
    const EMI_MAX_INSTALLMENTS = 'emi_max_inst_option';
    const EMI_INSTALLMENT_NO = 'emi_selected_inst';

    const CUSTOMER_NAME = 'cus_name';
    const CUSTOMER_EMAIL = 'cus_email';
    const CUSTOMER_ADDRESS_1 = 'cus_add1';
    const CUSTOMER_ADDRESS_2 = 'cus_add2';
    const CUSTOMER_CITY = 'cus_city';
    const CUSTOMER_STATE = 'cus_state';
    const CUSTOMER_POSTCODE = 'cus_postcode';
    const CUSTOMER_COUNTRY = 'cus_country';
    const CUSTOMER_PHONE = 'cus_phone';
    const CUSTOMER_FAX = 'cus_fax';

    const OPTIONAL_A = 'value_a';
    const OPTIONAL_B = 'value_b';
    const OPTIONAL_C = 'value_c';
    const OPTIONAL_D = 'value_d';

    const CART = 'cart';
    const CART_PRODUCT = 'product';
    const CART_PRODUCT_PRICE = 'amount';
    const PRODUCT_AMOUNT = 'product_amount';
    const VAT = 'vat';
    const DISCOUNT = 'discount_amount';
    const CONVENIENCE_FEE = 'convenience_fee';
}