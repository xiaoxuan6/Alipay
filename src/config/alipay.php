<?php
/**
 * Date: 2019/3/25
 * Time: 13:57
 */

 return [
     //应用ID,您的APPID。
     'app_id' => "2016****",

     //商户私钥
     'merchant_private_key' => "MIIEowIBAAKCAQEAuxybXI7XKA08v5NIx1gj3D3Ky5mu2qI8Li2/55Mrlws44SA7W1cvH9y9gTXNvNJQDQwAqIr9ljlz/ogiKqsUKMa0oR2aDwnmW9jFspEFopSUJDGfU+YP0m6tJQPZvbHRZwsrnjbxudnFpjN/TKLSSzjO12tO5T6n4I7j0mlWH/xYppAHcUDTtHzm02MhDYTQ67RKzTfEYJ8ZXIkBzkhKqwSkhzdbc014RscQpO2vzY978liJEoW3GxSE9dX3NytPDidGmYLYEj9cTTvsWpd/mgY8NhBsbn0rdDZL2yv/E1kN8Szb2qJFc8dKpg7oismtvlNx0Vu5Em3tAgiYn4DwYQIDAQABAoIBACskinIKAXQbsUEe7a4BFaunl8XgNp/0vlmLdO8pUOivzrqh2u3RqWz4Ub2kMT7zYz/O36v8+EGWF7e9ndsmvSw1vNpVX/tNtg7Babwlkh4NkibSRkFrD4Tevg+F1sPVZ0oSGkmNs6i9nMQYpaZ++GwduhuTg4p6Ku0tJTyTyybufGMDOz69biIoq8TaixqUQksGhPflA5439CHzJpwT/EyxFf70c7FETssOZW9dikLBf4ioG1atmQmaP/KeOripNUWU+PK/wX+dSphIKnr04HqpRF/qslxH3TElFS3rDLJI01+oAfukkq5eJhXFEjXdjAN56JT+j2zOCDiOKQi6rB0CgYEA5AAVG2UQWVZFWz/8FXMWAUi4chAxitC5bVZgTbosDQgB+JfU9Qjl176Bx5e8/+Lm6a3KUjtqeZaJb9GF3yDdiGsLQ5vRqqtlcbqeSUFPw8Gca86xA17IyCAdRGX5PkBy2QaRDCeW45VlWVURQbAJz5bVnfV0j2mJKm6nWDReFacCgYEA0hcPw5NI6NUQQnLAV/j54mcdzA8sSIRvZheNi6cZkxgaKFWZwNYMwL+dWtgLte0AHn0CkTEd2qUZf7AcBxjLnfbyoc2veqGBbaeghWpfRlkr6PLZZmbl0JDcj2UQ9jvtLOUhUJyWe1lyc+a7erk1tqnoLx+ZFxGmnnJn2UgfmrcCgYANDngm9nWmOAuGuzZLYCjNcAWn+odrxKIpwb2IFfY51NCQFNnMInNPFIjIDkdze+HvVdV1OhPR3K4IKj55VZ96FW8ysvShymjnx2ETHttbgXXcspxubfofg79JUHGif/xTs02RHZ9FbyO7puRzF4qoSaH4BrtjDw8cz/NjWLRelwKBgFmqdBTx0KVnAkiJ92PUpLonboVAWJMeyvjUxpm7GOQ53jgmyLeP4+OEJKG4Ic9ktq9MhYL4ZpiB7I8d1+iDgawK0OWUBvgc5EOrzowCqWU5+86xj23wLtfEbA5bgVDGpOSLapugKW298GZdLNklITKz85/hKZK5+tYXWBFZgfujAoGBAKe/af2lPTEJpIGsGVcp9kE+e1hDoFfsAhSEvJC3L4PHODKVaOPppnAg3N5444+l2P5lRe7bBsQxIFrHTkUfGjrqslQ0fEkgQc/UmoYYyu2c8SPmbLOntpHorswr4ydi+dpF2WRU0B914FMzQtZgE2tl0KcmXIkXPi1KCCyBWL9N",

     //异步通知地址
     'notify_url' => "pay-notify_url",

     //同步跳转
     'return_url' => "return_url",

     //编码格式
     'charset' => "UTF-8",

     //签名方式
     'sign_type'=>"RSA2",

     //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
     'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxwcwk3CYTSytfBcv50LaO5JcPiSwDIw17BFGmu0p2uYoArrZ5qxUaJ8/5W2bO3BgKvv+wEpXVt9bxivBWI2mm+VmY4Ql3fjjXXHLJPuHJ0pQo3k8YBQDNI5g5B0JYPwwsOmtXLaWqUlrLeht+YU/qXvKAfuQof4FcPRJPqAAElS+YjiLJYf8XkCfvUrx0y86S1fH9aoeXzPxa10+hAg/OzcejMh1uER7r9dIqVC4HguDgDtw7PpkyXspfCpw6uCexmf8s8z9bfuwY9TNQjygsJ+e7v21n5ri8W9oc1AQSCVwn4OOZAX6RpEbd4iA5lYW66mZIhCxWmxlueKmvNUPRQIDAQAB",

     // 模式 dev:沙箱测试 formal:正式
     'pattern' => 'dev',

     // 支付二维码模式 0:简约前置 1:前置模式 2:跳转模式 3:迷你前置 4:定义宽度的嵌入式二维码
     'qrcode' => [
        'type' => '2',
        'qrcode_width' => 100, // 只针对4模式有效
     ],

 ];