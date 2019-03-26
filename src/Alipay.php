<?php
/**
 * Date: 2019/3/25
 * Time: 13:56
 */

namespace James\Alipay;
require_once('AopSdk.php');

class Alipay
{
    protected $alipay;

    public function __construct()
    {
        $config = config('alipay');
        $aop = new \AopClient();
        $aop->gatewayUrl = $config['pattern'] == 'formal' ? $config['gatewayUrl'] : $config['gatewayDevUrl'];
        $aop->appId = $config['app_id'];
        $aop->rsaPrivateKey = $config['merchant_private_key'];
        $aop->alipayrsaPublicKey= $config['alipay_public_key'];
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';

        $this->alipay = $aop;
    }

    /**
     * 统一收单并支付页面接口
     * @param $goods_data 商品数据
     * @return bool|string|\提交表单HTML文本
     */
    public function pay($goods_data){
        try {
            $config = config('alipay');

            $order = $goods_data + ['product_code' => 'FAST_INSTANT_TRADE_PAY', 'qr_pay_mode' => $config['qrcode']['type']];

            if($config['qrcode']['type'] == 4)
                $order = $order + ['qrcode_width' => $config['qrcode']['qrcode_width']];

            $request = new \AlipayTradePagePayRequest ();
            $request->setNotifyUrl($config['notify_url']);
            $request->setReturnUrl($config['return_url']);
            $request->setBizContent(json_encode($order, JSON_UNESCAPED_UNICODE));

            $re = $this->alipay->pageExecute($request);
            self::writeLog('统一收单并支付页面接口', $re);

            return $re;
        }catch (\Exception $e){
            self::writeLog('统一收单并支付页面接口錯誤', $e->getMessage());
            return false;
        }
    }

    /**
     * 支付成功后的回调验证
     * @param $arr
     * @return bool
     */
    public function check($arr){
        $config = config('alipay');

        return $this->alipay->rsaCheckV1($arr, $config['alipay_public_key'], "RSA2");
    }

    /**
     * 统一收单交易退款接口
     * @param $order
     * @return bool|mixed|\SimpleXMLElement
     * @throws \Exception
     */
    public function refund($order){
        $request = new \AlipayTradeRefundRequest();
        $request->setBizContent(json_encode($order, JSON_UNESCAPED_UNICODE));

        $re = $this->alipay->execute($request);
        self::writeLog('统一收单交易退款接口', $re);

        return $re;
    }

    /**
     * 统一收单交易退款查询
     * @param $order
     * @param trade_no          支付宝交易号(特殊可选 二选一)
     * @param out_trade_no      订单支付时传入的商户订单号(特殊可选 二选一)
     * @param out_request_no    请求退款接口时(必选)
     * @param org_pid           银行间联模式下有用
     * @return bool|mixed|\SimpleXMLElement
     * @throws \Exception
     */
    public function refundQuery($order){
        $request = new \AlipayTradeFastpayRefundQueryRequest();
        $request->setBizContent(json_encode($order, JSON_UNESCAPED_UNICODE));

        $re = $this->alipay->execute($request);
        self::writeLog('统一收单交易退款查询', $re);

        return $re;
    }


    /**
     * 统一收单交易创建接口 预下单
     * @param $order
     * @param out_trade_no      商户订单号
     * @param total_amount      订单总金额
     * @param subject           订单标题
     * @return bool|mixed|\SimpleXMLElement
     * @throws \Exception
     */
    /*public function create($order){
        $request = new \AlipayTradeCreateRequest();
        $request->setBizContent(json_encode($order, JSON_UNESCAPED_UNICODE));

        return $this->alipay->execute($request);
    }*/

    /**
     * 统一收单交易支付接口
     * @param $order
     * @param out_trade_no  商户订单号
     * @param scene         支付场景 条码支付，取值：bar_code  声波支付，取值：wave_code
     * @param auth_code     支付授权码
     * @param subject       订单标题
     * @return bool
     */
   /* public function pay($order){
        $request = new \AlipayTradePayRequest();
        $request->setBizContent(json_encode(array_merge($order, ['product_code' => 'FACE_TO_FACE_PAYMENT']), JSON_UNESCAPED_UNICODE));

        return $this->alipay->execute($request);
    }*/

    /**
     * 关闭订单
     * @param $order
     * @param trade_no
     * @param out_trade_no
     * @return bool|mixed|\SimpleXMLElement
     * @throws \Exception
     */
    public function close($order){
        $request = new \AlipayTradeCloseRequest();
        $request->setBizContent(json_encode($order , JSON_UNESCAPED_UNICODE));

        return $this->alipay->execute($request);
    }

    /**
     * 统一收单线下交易预创建
     * @param $order
     * @return bool|mixed|\SimpleXMLElement
     * @throws \Exception
     */
    public function precreate($order){
        $request = new \AlipayTradePrecreateRequest();
        $request->setBizContent(json_encode($order , JSON_UNESCAPED_UNICODE));

        $re = $this->alipay->execute($request);
        self::writeLog('统一收单线下交易预创建', $re);

        return $re;
    }

    /**
     * 线下交易查询
     * @param $order
     * @return bool|mixed|\SimpleXMLElement
     * @throws \Exception
     */
    public function query($order){
        $request = new \AlipayTradeQueryRequest();
        $request->setBizContent(json_encode($order , JSON_UNESCAPED_UNICODE));

        $re = $this->alipay->execute($request);
        self::writeLog('统一收单线下交易预创建', $re);

        return $re;
    }

    /**
     * 记录日志
     * @param $data
     */
    protected static function writeLog($method, $result){

        $data = '['.date("Y-m-d").'] '.$method.' => '.json_encode($result, JSON_UNESCAPED_UNICODE);

        file_put_contents(storage_path('alipay.log'), $data, FILE_APPEND);
    }
}
