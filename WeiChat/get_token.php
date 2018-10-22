<?php
    //定义请求的url地址
    $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxd0a895714672af7d&secret=9378c69fdac9bea140b1c25f5c0380dd';
    //使用http_request函数发送请求
    $str = http_request($url);
    //使用json_decode对$str进行转移
    $json = json_decode($str);
    //输出access_token
    //echo $json->access_token;
    //定义一个变量保存access_token这个值
    $access_token = $json->access_token;
    //封装curl库
    function http_request($url, $data=null) {
        //第一步：创建curl
        $ch = curl_init();
        //第二步：设置curl
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //禁止服务器端校检SSL证书
        //判断$data数据是否为空
        if(!empty($data)) {
            //模拟发送POST请求
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //以文档流的形式返回数据
        //第三步：执行curl
        $output = curl_exec($ch);
        //第四步：关闭curl
        curl_close($ch);
        //把$output当做返回值返回
        return $output;
    }