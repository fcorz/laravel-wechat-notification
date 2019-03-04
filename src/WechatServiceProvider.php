<?php
/**
 * Created by PhpStorm.
 * User: fengchen
 * Date: 2019/2/22
 * Time: 下午5:57
 */

namespace Fengchenorz\Wechat;

use Illuminate\Support\ServiceProvider;

class WechatServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services
     */
    public function boot()
    {
        $this->app->when(TemplateChannel::class)
            ->give('wechat_notice');
    }

    /**
     * 在容器中注册绑定.
     * @return void
     */
    public function register()
    {
        
    }

}