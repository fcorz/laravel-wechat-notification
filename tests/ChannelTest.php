<?php

declare(strict_types=1);
/**
 * This file is part of mas.
 *
 * @link     https://github.com/fcorz/laravel-wechat-notification
 * @document https://github.com/fcorz/laravel-wechat-notification/blob/master/README.md
 * @contact  fengchenorz@gmail.com
 */

namespace fcorz\WechatNotification\Tests;

use fcorz\WechatNotification\TemplateChannel;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ChannelTest extends TestCase
{
    public function testWechatNotificationWithInvalidConfig()
    {

        $this->expectException(\RuntimeException::class);

        $this->expectExceptionMessage('A facade root has not been set.');

        $channel = new TemplateChannel();

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

}
