<?php

namespace App\Notifications;

use Fengchenorz\Wechat\TemplateChannel;
use Fengchenorz\Wechat\TemplateMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class TemplateNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $templateMessage;

    /**
     * TemplateNotification constructor.
     * @param     $templateMessage
     * @param int $delay
     */
    public function __construct($templateMessage, $delay = 0)
    {
        $this->queue = 'notification';
        // 延時執行
        $this->delay = $delay;
        // 嘗試次數
        $this->tries = 3;

        $this->templateMessage = $templateMessage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TemplateChannel::class];
    }

    /**
     * @param $notifiable
     * @return \Fengchenorz\Wechat\TemplateMessage
     */
    public function toWechat($notifiable)
    {
        // data example
        // $this->templateMessage->data = [
        //     'first'    => 'Test First',
        //     'keyword1' => 'keyword1',
        //     'keyword2' => 'keyword2',
        //     'keyword3' => ['keyword3', '#000000'],
        //     'remark'   => ['value' => 'remark', 'color' => '#550038'],
        // ];

        return (new TemplateMessage())
            ->to($this->templateMessage->openid)
            ->template($this->templateMessage->template_id)
            ->url($this->templateMessage->url)
            ->data($this->templateMessage->data);
    }

}
