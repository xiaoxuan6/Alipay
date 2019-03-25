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

3、，退款
     
     * @param out_trade_no 订单号
     * @param refund_amount 金额
     * @param refund_reason 退款原因
    $alipay = new Alipay();
    $re = $alipay->refund($order);
    
4、退款查询
     
     * @param out_trade_no  订单支付时传入的商户订单号
     * @param out_request_no 请求退款接口时，传入的退款请求号
    $alipay = new Alipay();
    $re = $alipay->refundQuery($order);
    
5、统一收单线下交易预创建（生成自定义二维码）
     
     * @param out_trade_no 订单号
     * @param total_amount 订单总金额
     * @param subject 订单标题
    $alipay = new Alipay();
    $re = $alipay->precreate($order);
    
6、统一收单线下交易查询

     * @param out_trade_no 订单号
    $alipay = new Alipay();
    $re = $alipay->query($order);
