# SSLCommerz
[SSLCommerz](https://www.sslcommerz.com) Payment gateway library for Laravel framework. Official documentation is [here](https://developer.sslcommerz.com/docs.html).

## install
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
SANDBOX_MODE=true
``` 

### Initiating a Payment session
This `initSession` will give you a gateway url. With this url you will be able to continue the payment through sslcommerz.
```php
$customer = new Customer('Mahabubul Hasan', 'mahabub@example.com', '0171xxxxx22');
$resp = Client::initSession($customer, 29); //29 is the amount
echo $resp->getGatewayUrl();
```
or with configuration
```php
$customer = new Customer('Mahabubul Hasan', 'mahabub@example.com', '0171xxxxx22');
$config[SessionRequest::EMI] = '0';
$resp = Client::initSession($customer, 29, $config);
echo $resp->getGatewayUrl();
```

### Request for Validation
This `verifyOrder` method takes a `val_id` as parameter which you will get in the IPN request.

```php
$resp = Client::verifyOrder('180828114058np43AJdzJJOsYzc');
echo 'status: '.$resp->getStatus();
echo 'transaction: '.$resp->getTransactionId();
```

### IPN Listener (Step 4,5)
After filling the card information and submission in the sslcommerz window it will send a IPN notificaion to your
specified IPN url. To grab the notification use the following code. For more details [see here](https://developer.sslcommerz.com/docs.html)
 
```php
if(ipn_hash_varify(config('sslcommerz.store_password'))){
    $ipn = new IpnNotification($_POST);
    $val_id = $ipn->getValId();
    $transaction_id = $ipn->getTransactionId();
    $amount = $ipn->getAmount();
    $resp = Client::verifyOrder($val_id);
} 
```

### SSLCommerz process flow

![alt text](https://developer.sslcommerz.com/assets/images/banner/sslc_process.png "Process flow") 