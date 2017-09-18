<?php
include_once 'Antfin.class.php';
/*
 * 以下参数为沙箱测试环境下参数
 */
$config['appId'] = '***************';
$config['gatewayUrl'] = 'https://openapi.alipaydev.com/gateway.do';
$config['notify_url'] = $_SERVER['SERVER_NAME'].'/notify.php';
$config['return_url'] = $_SERVER['SERVER_NAME'].'/return.php';
//密钥 暂时只支持RSA加密，不支持RSA2     RSA签名验签工具生成密钥时请使用【PKCS1非JAVA】    密钥暂时不支持读取文件   有需要可以改类里的  sign签名方式
$config['alipayPublicKey'] = '***************************';
$config['rsaPrivateKey'] = '*******************************************';
$antfin = new Antfin($config);//$config 可以传蚂蚁金服参数，不传默认查询数据库里的参数（数据库查询用的是thinkphp框架查询）
$data = array(//订单信息
    'productCode'=>'QUICK_WAP_PAY',
    'body'=>'test',
    'subject'=>'测试订单',
    'out_trade_no'=>time().rand(1,200),
    'total_amount'=>'0.01',
    'timeout_express'=>'1m',
);
$s = $antfin->alipaytradewappay($data);
print_r($s);die;



?>