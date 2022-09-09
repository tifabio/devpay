<?php

namespace Tests\Unit\Domain\Account\Type;

use App\Domain\Entities\Transaction\Status\Approved;
use App\Domain\Entities\Transaction\Status\Canceled;
use App\Domain\Entities\Transaction\Status\Finished;
use App\Domain\Entities\Transaction\Status\Pending;
use Tests\TestCase;

class TransactionStatusTest extends TestCase
{
    public function testApprovedStatus()
    {
        $approved = new Approved();

        $this->assertEquals($approved->getType(), 'APPROVED');
    }

    public function testCanceledStatus()
    {
        $canceled = new Canceled();

        $this->assertEquals($canceled->getType(), 'CANCELED');
    }

    public function testFinishedStatus()
    {
        $finished = new Finished();

        $this->assertEquals($finished->getType(), 'FINISHED');
    }

    public function testPendingStatus()
    {
        $pending = new Pending();

        $this->assertEquals($pending->getType(), 'PENDING');
    }
}
