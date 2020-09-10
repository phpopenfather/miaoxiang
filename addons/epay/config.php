<?php

return array(
    array(
        'name'    => 'wechat',
        'title'   => '微信',
        'type'    => 'array',
        'content' =>
            array(),
        'value'   => [
            'appid'       => '13771131002', // APP APPID
            'app_id'      => 'wx979cd95eaef55175', // 公众号 APPID
            'app_secret'  => '57e701c343accb165671bea3bd7c4d63', // 公众号 APPSECRET
            'miniapp_id'  => '', // 小程序 APPID
            'mch_id'      => '1602569012', //支付商户ID
            'key'         => '58eca2c55360c0f6d1f1e597492d4191',//秘钥32位（miaoxiang的MD5加密小写）
            'notify_url'  => '/addons/epay/api/notifyx/type/wechat', //请勿修改此配置
            'cert_client' => '/epay/certs/apiclient_cert.pem', // 可选, 退款，红包等情况时需要用到
            'cert_key'    => '/epay/certs/apiclient_key.pem',// 可选, 退款，红包等情况时需要用到
            'log'         => 1,
            'mode'        => '', // optional,设置此参数，将进入沙箱模式
        ],
        'rule'    => '',
        'msg'     => '',
        'tip'     => '微信参数配置',
        'ok'      => '',
        'extend'  => '',
    ),
    array(
        'name'    => 'alipay',
        'title'   => '支付宝',
        'type'    => 'array',
        'content' =>
            array(),
        'value'   => [
            'app_id'         => '2016092300580218',
            'notify_url'     => '/addons/epay/api/notifyx/type/alipay', //请勿修改此配置
            'return_url'     => '/addons/epay/api/returnx/type/alipay', //请勿修改此配置
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzCrHmRr8+LjXCxxZ8jOR3X+/0SHfzJPWBe0r41LGadZng7BNxBnt90S3pFhrNpIDyqgnXqF+0tptMMD5oiSeQk+hg+RT0hIoFwTWEoIJs+9wR0LTPVt1Xqt5R9jZo9wdR+Ckxhq0z05mjui5wQEwoUB/5uivRG13Bkmfu1V1LYx5S47F9lSHEqS7XOKMeOXeqNfA/Hy1yx5ghnpmGONyA0/mAZvua5HUMzxCTF4tck1knkOZOf6146YBknARkY2loGFTEBci/7JXsvcJw1w9vVLtZ3ajCoRgNi1VSuJQQ6o8Geua+0INz37QzvH5Gb+9lkP7HDFwkgEMAhkgq3qDhwIDAQAB',
            'private_key'    => 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCrHkPWNpyCnz7XF0PGSzNfFE6SgkwQ4unnL00WzpqkKHFM6f56qIBdikY09KMt4zRk/5okwNVrgV7bIAgR9vJaWzVq17fGDO9vcbT3Jl5ofeqYgIeGxT8vlWsSqGbFBkHN2XqK3LhrD7TnJKosiAGv1QbnCTO5BQA1yhiJ8vDBjZqswmWtIeLkCBhpiSGMpz62juge9HdiibSdJf+CPfP/CCtsJrYr039s+HaIpMaxbYkY225qsHzw2V3N9Kgs+vLkkVXKNaSmdvEFqll62WF3RtAz399gSOBeQyVN6M82s7oV3gChaJqj77vVKXt8h2Ydt34OJc4inYTBh+0g/KddAgMBAAECggEBAJzPUkkGqKxG9FY1eqVHmp8Bw/MctkovNzvlK9a/pBTU/ucF829B5MhTg3zZxoOxlv0LAp21nJ404tEZbGvSCktlE/GCF2XFytEsuTJXleJZqVbxScDmFr4rRgDGE89vqXPTXSnNlK5/qT68abn/NNSF+hpUY3Kks4mXVp9r4tbqxioJvKPqaMflHHwUep83ZoVbhUir0lL/sDgjQM0RyWmPCKsPKbAc+okGDULwdtDs+hHSMz96mHeydB/aGBj/AXTH7xOdXUV1K+ZKyQufHvUu+jqibhIx32uk0AgFr0TX1IKcGfVh9ugo3TTWJNE5fmoxNbs01ABS07zwmXwM4L0CgYEA2iYazkqxFh4oDNyErHrERUekhYr2WvrUwgUiiVSHjdjt/ezY1JKkPfRVPp5VzV0eGGbIvukwEzxtJonBjRLYK8vl87IZrwjuICImMhDZho/Z5ajQsSW99MVT9aDVIGkQX9S+4YQzhQpd6BABQ0B9dfAdRLi4jAMdTAl8M6lclzcCgYEAyM8em/fkXFlxdEP2/0pxY7bRNRLnL8Zzs/1O75BRLl3jtYNCuiAX9TETAjO6nm1nvLYys6i1t5gmLF6ureouU9YLCFwHIxTJrKeOKlhSV8E4StvTFmOz5gLb/1ApXHs6frO/z66zB9tPBrSXUVb7Q3d87E1a8xBK5nSnAoNTGAsCgYEAkSe5vnrEysrWK3iwb3RhFRhOyO1mb7NnzpJMIMU2TZSDB+uJfCj3UKI79qa0wSms1N/Pw/i2HJagqnwPZieb38iVAksH/AgdKxSOBdJga8FcZAyokLdkZnLHIzIZnq9KTfnp6XVmMqhrQ/ciX/WRheB4GTow0jlgTTAijN2s1pECgYBgL9XZn8Qi+DUAHA4T+vSVbtyHL6bNm6GQdaV52wcHzrFkIJu1y+mt6PPR+jVJ7d3i5uMia42fg6HFXxUM+T93qO9f8bT5eNuheCEA542Ju2Pbd7CE6P0jD/uRMDSft+ctCay3LldTTBlufNJ+g8uXZYTRK7yE8SjverEE4yLKQQKBgHy69VUQ8a8urFG6GxPTUPvSxNO6nt5qoMwggyOy7s5pFRiZomt5hLrCj2lDlSWXHPpYLoOMUDOmeQXN8DFg6yp/GbPp3VAI8EgfMKX/qz0gur5sThVJKpNIzWBKXdx7gYyWm3XzekHy+SVzDAuBjbjFImXS32Xx9Hs5O5U3rvd0',
            'log'            => 1,
            'mode'           => 'dev', // optional,设置此参数，将进入沙箱模式
        ],
        'rule'    => 'required',
        'msg'     => '',
        'tip'     => '支付宝参数配置',
        'ok'      => '',
        'extend'  => '',
    ),
    array(

        'name'    => '__tips__',
        'title'   => '温馨提示',
        'type'    => 'array',
        'content' =>
            array(),
        'value'   => '请注意微信支付证书路径位于/addons/epay/certs目录下，请替换成你自己的证书<br>appid：APP的appid<br>app_id：公众号的appid<br>app_secret：公众号的secret<br>miniapp_id：小程序ID<br>mch_id：微信商户ID<br>key：微信商户支付的密钥',
        'rule'    => '',
        'msg'     => '',
        'tip'     => '微信参数配置',
        'ok'      => '',
        'extend'  => '',
    )
);