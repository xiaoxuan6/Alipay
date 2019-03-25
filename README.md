支付宝SDK
======

安装：

    composer require james.xue/alipay
    php artisan vendor:publish --tag=alipay

使用：

1、生成订单并跳转支付

    $goods_data = [
        'out_trade_no' => $out_trade_no, // 订单号
        'total_amount' => 0.01,
        'subject' => '支付测试',
        'body' => '测试测试测试测试测试测试'
    ];
    $alipay = new Alipay();
    return $alipay->pay($goods_data);

2、回调

    $arr = $request->all();
    $alipay = new Alipay();
    $result = $alipay->check($arr);

3、