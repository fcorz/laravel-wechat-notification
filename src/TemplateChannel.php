<?php
/**
 * Created by PhpStorm.
 * User: fengchen
 * Date: 2019/2/22
 * Time: 上午11:47
 */

namespace Fengchenorz\Wechat;

use Fengchenorz\Wechat\Exceptions\InvalidConfigException;
use Illuminate\Notifications\Notification;

class TemplateChannel
{

    public function send($notifiable, Notification $notification, $account = "default")
    {
        $message = $notification->toWechat($notifiable);

        // some validate
        $config = config(\sprintf('wechat.official_account.%s', $account), []);

        if (empty($config)) {
            // throw Exception
            throw new InvalidConfigException("Invalid wechat official_account config");
        }

        return app($config)->template_message->send([
            'touser'      => $message->openid,
            'template_id' => $message->template_id,
            'url'         => $message->url,
            'data'        => $message->data,
        ]);
    }

}