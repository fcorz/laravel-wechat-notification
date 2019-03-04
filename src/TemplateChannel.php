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

        try {
            return $this->app->template_message->send([
                'touser'      => $message->openid,
                'template_id' => $message->template_id,
                'url'         => $message->url,
                'data'        => $message->data,
            ]);
        } catch (\Exception $e) {
            return (object)[
                'errcode' => $e->getCode(),
                'errmsg'  => $e->getMessage(),
            ];
        }
    }

}