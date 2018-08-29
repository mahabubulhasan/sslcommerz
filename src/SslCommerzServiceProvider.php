<?php
/**
 * @author: Mahabubul Hasan <codehasan@gmail.com>
 * Date: 8/29/2018
 * Time: 12:58 PM
 */

namespace Uzzal\SslCommerz;


use Illuminate\Support\ServiceProvider;

class SslCommerzServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->publishes([
            __DIR__.'/sslcommerz.php' => config_path('sslcommerz.php'),
        ]);
    }
}