<h1 align="center"> laravel-wechat-notification </h1>

> ✎ 基于 EasyWeChat 和 Laravel 的消息模板通知

## 环境要求
* PHP >= 7.2
* Laravel >= 7.0
* EasyWeChat >= 5.0

## 安装

```shell
$ composer require fcorz/laravel-wechat-notification -vvv
```

## 使用

### User

~~~php
class User
{
    use Notifiable;

    public function routeNotificationForWechat()
    {
        return 'xxxx'; // openid
    }
}
~~~

### 发送

~~~php
\Notification::send($user, new \fcorz\WechatNotification\TemplateNotification($templateId, $url, $data));
~~~

## 参考
[overtrue/laravel-wechat](https://github.com/overtrue/laravel-wechat)