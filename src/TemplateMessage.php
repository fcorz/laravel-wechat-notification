<?php
/**
 * Created by PhpStorm.
 * User: fengchen
 * Date: 2019/2/22
 * Time: 上午11:47
 */

namespace Fengchenorz\Wechat;

class TemplateMessage
{
    public $openid;
    public $template_id;
    public $url;
    public $data;

    public function __construct($openId = '', $templateId = '', $url = '', $data = [])
    {
        $this->openid      = $openId;
        $this->template_id = $templateId;
        $this->url         = $url;
        $this->data        = $data;
    }

    /**
     * @return self
     */
    public function to($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    /**
     * @return self
     */
    public function template($template_id)
    {
        $this->template_id = $template_id;

        return $this;
    }

    /**
     * @return self
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return self
     */
    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

}