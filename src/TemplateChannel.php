<?php
/**
 * Created by PhpStorm.
 * User: fengchen
 * Date: 2019/2/22
 * Time: 上午11:47
 */

namespace Fengchenorz\WechatNotification;

use Fengchenorz\WechatNotification\Exceptions\InvalidConfigException;
use Illuminate\Notifications\Notification;

class TemplateChannel
{
    public $app;

    public function __construct()
    {
        // some validate
        $config = config('wechat.official_account.default', []);

        if (empty($config)) {
            // throw Exception
            throw new InvalidConfigException("Invalid wechat official_account config");
        }

        $this->app = app($config);
    }

    /**
     * @param                                        $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return object
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWechat($notifiable);
        $to      = $notifiable->routeNotificationFor('wechat');

        return $this->app->template_message->send([
            'touser'      => $to,
            'template_id' => $message->templateId,
            'url'         => $message->url,
            'data'        => $message->data,
        ]);
    }

}