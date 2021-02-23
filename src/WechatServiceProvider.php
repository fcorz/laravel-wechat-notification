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

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\ServiceProvider;

class WechatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->make(ChannelManager::class)->extend('wechat_notice', function ($app) {
            return $app->make(TemplateChannel::class);
        });
    }
}
