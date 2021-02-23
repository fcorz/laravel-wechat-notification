<?php

declare(strict_types=1);
/**
 * This file is part of mas.
 *
 * @link     https://github.com/fcorz/laravel-wechat-notification
 * @document https://github.com/fcorz/laravel-wechat-notification/blob/master/README.md
 * @contact  fengchenorz@gmail.com
 */
namespace fcorz\WechatNotification;

use fcorz\WechatNotification\Exceptions\InvalidConfigException;
use Illuminate\Notifications\Notification;

class TemplateChannel
{
    public $app;

    /**
     * init channel.
     * TemplateChannel constructor.
     * @throws InvalidConfigException
     */
    public function __construct()
    {
        $config = config('wechat.official_account.default', []);

        if (empty($config)) {
            throw new InvalidConfigException('Invalid wechat official_account config');
        }

        $this->app = app($config);
    }

    /**
     * send.
     * @param $notifiable
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
