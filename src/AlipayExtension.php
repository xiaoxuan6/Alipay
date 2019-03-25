<?php

namespace James\Alipay;

use Encore\Admin\Admin;
use Encore\Admin\Extension;

class AlipayExtension extends Extension
{
    public static function boot(){
        Admin::extend('alipay', __CLASS__);
    }

    public function register(){
        $this->app->singleton('alipay', function ($app) {
            return new Alipay();
        });
    }
}