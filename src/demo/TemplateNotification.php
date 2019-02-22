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

    public $template_message;

    /**
     * TemplateNotification constructor.
     * @param     $template_message
     * @param int $delay
     */
    public function __construct($template_message, $delay = 0)
    {
        $this->queue = 'notification';
        // 延時執行
        $this->delay = $delay;
        // 嘗試次數
        $this->tries = 3;

        $this->template_message = $template_message;
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
        // $this->template_message->data = [
        //     'first'    => 'Test First',
        //     'keyword1' => 'keyword1',
        //     'keyword2' => 'keyword2',
        //     'keyword3' => ['keyword3', '#000000'],
        //     'remark'   => ['value' => 'remark', 'color' => '#550038'],
        // ];

        return (new TemplateMessage())
            ->to($this->template_message->openid)
            ->template($this->template_message->template_id)
            ->url($this->template_message->url)
            ->data($this->template_message->data);
    }

}
