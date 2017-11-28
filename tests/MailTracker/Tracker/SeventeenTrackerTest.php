<?php

namespace MailTracker\Tests\Tracker;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use MailTracker\TrackedItem;
use MailTracker\Tracker\SeventeenTracker;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class SeventeenTrackerTest extends TestCase
{
    /**
     * @var ClientInterface|ObjectProphecy
     */
    private $client;

    /**
     * @var SeventeenTracker
     */
    private $seventeenTracker;

    public function setUp()
    {
        $this->client = new Client();

        $this->seventeenTracker = new SeventeenTracker(
            $this->client
        );
    }

    public function testFetch()
    {
        $trackedItem = new TrackedItem(123);

        $this->seventeenTracker->fetch($trackedItem);
    }

}
