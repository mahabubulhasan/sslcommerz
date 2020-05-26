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
        
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/sslcommerz.php' => $this->app->configPath('sslcommerz.php'),
        ], 'sslcommerz');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/sslcommerz.php',
            'sslcommerz'
        );
    }
}
