# SSLCommerz
[SSLCommerz](https://www.sslcommerz.com) Payment gateway library for Laravel framework

##install
```
composer require uzzal/sslcommerz
```

### publish
```
artisan vendor:publish
```
This command will create a `sslcommerz.php` file inside the `config` directory. Configure your parameters in your `.env` file
```
#sslcommerz
STORE_ID=your_store_id
STORE_PASSWORD=your_store_password
SUCCESS_URL=http://your-domain.at/success.php
FAIL_URL=http://your-domain.at/fail.php
CANCEL_URL=http://your-domain.at/cancel.php
``` 

###Initiating a Payment session
This `initSession` will give you a gateway url. With this url you will be able to continue the payment through sslcommerz.
```php
$customer = new Customer('Mahabubul Hasan', 'mahabub@example.com', '0171xxxxx22');
$resp = Client::initSession($customer, 29, true); //last parameter true is for sandbox
echo $resp->getGatewayUrl();
```

###Order verification
`verifyOrder` method takes a val_id as parameter which you will get in the IPN request.

```php
$resp = Client::verifyOrder('180828114058np43AJdzJJOsYzc', true);  //last parameter true is for sandbox
echo 'status: '.$resp->getStatus();
echo 'transaction: '.$resp->getTransactionId();
```