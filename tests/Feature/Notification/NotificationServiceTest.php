<?php

namespace Tests\Feature\Notification;

use App\Domain\Entities\Notification\Notification;
use App\Domain\Entities\Notification\Status\Pending;
use App\Domain\Entities\Notification\Status\Sent;
use App\Domain\Services\Notification\NotificationService;
use App\Infrastructure\ORM\Models\Notification as NotificationModel;
use Faker\Factory as Faker;
use Tests\TestCase;

class NotificationServiceTest extends TestCase
{   
    private NotificationService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = app(NotificationService::class);
    }

    public function testCreateNotification(): void
    {
        $notification = $this->mockNotification();
        $createNotification = $this->service->create($notification);
        $this->assertTrue($createNotification instanceof NotificationModel);
    }

    public function testSendNotification(): void
    {
        $notification = $this->mockNotification();
        $createNotification = $this->service->create($notification);
        $notification->setUid($createNotification->id);
        $sendNotification = $this->service->send($notification);

        $this->assertTrue($sendNotification->getNotificationStatus() instanceof Sent);
    }

    private function mockNotification(): Notification
    {
        $faker = Faker::create('pt_BR');

        $notification = new Notification();
        $notification->setContent($faker->realText());
        $notification->setNotificationStatus(new Pending());

        return $notification;
    }
}