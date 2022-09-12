<?php

namespace Tests\Unit\Domain\Notification\Status;

use App\Domain\Entities\Notification\Status\Pending;
use App\Domain\Entities\Notification\Status\Sent;
use Tests\TestCase;

class NotificationStatusTest extends TestCase
{
    public function testPendingStatus()
    {
        $pending = new Pending();

        $this->assertEquals($pending->getType(), 'PENDING');
    }

    public function testSentStatus()
    {
        $sent = new Sent();

        $this->assertEquals($sent->getType(), 'SENT');
    }
}
