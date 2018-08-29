<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/29/2018
 * Time: 1:15 PM
 */

namespace Uzzal\SslCommerz;


class Client
{
    /**
     * @param Customer $customer
     * @param $amount
     * @param bool $isSandbox
     * @return SessionResponse
     * @throws Exceptions\RequestParameterMissingException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function initSession(Customer $customer, $amount, $isSandbox=false){
        $data[SessionRequest::STORE_ID] = config('sslcommerz.store_id');
        $data[SessionRequest::STORE_PASSWORD] = config('sslcommerz.store_password');
        $data[SessionRequest::TOTAL_AMOUNT] = $amount;
        $data[SessionRequest::CURRENCY] = config('sslcommerz.currency');;
        $data[SessionRequest::TRANSACTION_ID] = "TRANSACTION_".uniqid();
        $data[SessionRequest::SUCCESS_URL] = config('sslcommerz.success_url');
        $data[SessionRequest::FAIL_URL] = config('sslcommerz.fail_url');
        $data[SessionRequest::CANCEL_URL] = config('sslcommerz.cancel_url');
        $data[SessionRequest::EMI] = '1';
        $data[SessionRequest::CUSTOMER_NAME] = $customer->getName();
        $data[SessionRequest::CUSTOMER_EMAIL] = $customer->getEmail();
        $data[SessionRequest::CUSTOMER_PHONE] = $customer->getPhone();

        $request = new SessionRequest($data);
        return $request->send($isSandbox);
    }

    /**
     * @param $valId
     * @param $isSandbox
     * @return OrderValidationResponse
     */
    public static function verifyOrder($valId, $isSandbox=false){
        $data[OrderValidationRequest::VAL_ID] = $valId;
        $data[OrderValidationRequest::STORE_ID] = config('sslcommerz.store_id');
        $data[OrderValidationRequest::STORE_PASSWORD] = config('sslcommerz.store_password');

        $request = new OrderValidationRequest($data);
        return $request->send($isSandbox);
    }
}