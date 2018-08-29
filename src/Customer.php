<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/29/2018
 * Time: 1:20 PM
 */

namespace Uzzal\SslCommerz;


class Customer
{
    private $_name;
    private $_email;
    private $_phone;

    public function __construct($name, $email, $phone)
    {
        $this->_name = $name;
        $this->_email = $email;
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }


    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

}