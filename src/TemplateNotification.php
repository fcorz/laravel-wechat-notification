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

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class TemplateNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $templateId;

    protected $url;

    protected $data;

    /**
     * TemplateNotification constructor.
     * @param $templateId
     * @param $url
     * @param $data
     * @param int $delay
     */
    public function __construct($templateId = '', $url = '', $data = [], $delay = 0)
    {
        $this->queue = 'notification';
        // 延時執行
        $this->delay = $delay;
        // 嘗試次數
        $this->tries = 3;

        $this->templateId = $templateId;
        $this->url        = $url;
        $this->data       = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['wechat_notice'];
    }

    /**
     * @param $notifiable
     * @return \fcorz\WechatNotification\TemplateMessage
     */
    public function toWechat($notifiable)
    {
        return (new TemplateMessage())
            ->template($this->templateId)
            ->url($this->url)
            ->data($this->data);
    }
}
