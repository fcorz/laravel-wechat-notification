<?php
/**
 * Created by PhpStorm.
 * User: fengchen
 * Date: 2019/2/22
 * Time: 下午5:57
 */

namespace Fengchenorz\WechatNotification;

use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;

class WechatServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services
     */
    public function boot()
    {
        //
    }

    /**
     * 在容器中注册绑定.
     * @return void
     */
    public function register()
    {
        $this->app->make(ChannelManager::class)->extend('wechat_notice', function ($app) {
            return $app->make(TemplateChannel::class);
        });
    }

}