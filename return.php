<?php
/**
 * Created by PhpStorm.
 * User: wuyang
 * Date: 2017/9/18
 * Time: 11:34
 */
include_once 'Antfin.class.php';
$arr=$_POST;
$config['appId'] = '*****************';
$config['gatewayUrl'] = 'https://openapi.alipaydev.com/gateway.do';
$config['notify_url'] = $_SERVER['SERVER_NAME'].'/notify.php';
$config['return_url'] = $_SERVER['SERVER_NAME'].'/return.php';
//密钥 暂时只支持RSA加密，不支持RSA2     RSA签名验签工具生成密钥时请使用【PKCS1非JAVA】    密钥暂时不支持读取文件   有需要可以改类里的  sign签名方式
$config['alipayPublicKey'] = '***************************';
$config['rsaPrivateKey'] = '*******************************************';
$antfin = new Antfin($config);//$config 可以传蚂蚁金服参数，不传默认查询数据库里的参数（数据库查询用的是thinkphp框架查询）
$s = $antfin->check($arr);//解密
if($s){
    echo '验证成功';
    //订单处理
}else{
    echo '验签失败';
}