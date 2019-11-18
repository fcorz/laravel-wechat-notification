<h1 align="center"> laravel-wechat-notification </h1>

> ✎ 基于 EasyWeChat 和 Laravel 5的消息模板通知

## 环境要求
* PHP >= 7.0
* Laravel >= 5.5
* EasyWeChat 4.0

## 安装

```shell
$ composer require fengchenorz/laravel-wechat-notification -vvv
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
\Notification::send($user, new \Fengchenorz\WechatNotification\TemplateNotification($templateId, $url, $data));
~~~

## 参考
[overtrue/laravel-wechat](https://github.com/overtrue/laravel-wechat)