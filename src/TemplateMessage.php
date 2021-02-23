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

class TemplateMessage
{
    public $openid;

    public $templateId;

    public $url;

    public $data;

    public function __construct($openId = '', $templateId = '', $url = '', $data = [])
    {
        $this->openid     = $openId;
        $this->templateId = $templateId;
        $this->url        = $url;
        $this->data       = $data;
    }

    /**
     * @param string $openId
     * @return self
     */
    public function to($openId)
    {
        $this->openid = $openId;

        return $this;
    }

    /**
     * @param string $templateId
     * @return self
     */
    public function template($templateId)
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * @param string $url
     * @return self
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param mixed $data
     * @return self
     */
    public function data($data)
    {
        $this->data = $data;

        return $this;
    }
}
