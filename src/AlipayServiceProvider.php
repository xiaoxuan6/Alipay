<?php

namespace James\Alipay;

use Illuminate\Support\ServiceProvider;

class AlipayServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/config/alipay.php' => config_path('alipay.php')],'alipay');
        }

        AlipayExtension::boot();
    }
}