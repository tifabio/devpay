<?php

namespace Tests\Unit\Domain\Notification;

use App\Domain\Entities\Notification\Notification;
use App\Domain\Entities\Notification\Status\Pending;
use Tests\TestCase;
use Faker\Factory as Faker;

class NotificationTest extends TestCase
{
    public function testNotificationAttributes()
    {
        $faker = Faker::create('pt_BR');

        $uid = $faker->randomDigit;
        $content = $faker->realText();
        $notificationStatus = new Pending();

        $notification = new Notification();
        $notification->setUid($uid);
        $notification->setContent($content);
        $notification->setNotificationStatus($notificationStatus);

        $this->assertEquals($uid, $notification->getUid());
        $this->assertEquals($content, $notification->getContent());
        $this->assertEquals($notificationStatus, $notification->getNotificationStatus());
    }
}
