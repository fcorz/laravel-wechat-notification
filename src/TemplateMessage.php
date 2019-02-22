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

    public function __construct($param)
    {
        $this->openid      = $param->openid ?? '';
        $this->template_id = $param->template_id ?? '';
        $this->url         = $param->url ?? '';
        $this->data        = $param->data ?? '';
    }

    public function to($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    public function template($template_id)
    {
        $this->template_id = $template_id;

        return $this;
    }

    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

}