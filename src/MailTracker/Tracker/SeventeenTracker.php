<?php

namespace MailTracker\Tracker;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use MailTracker\TrackedItem;

/**
 * 17Track
 *
 * @package MailTracker
 * @author Luis Lopes <josluis.lopes@gmail.com>
 */
class SeventeenTracker
{
    private const TRACK_URL = 'http://www.17track.net/en/track?nums=';
    private const API_URL = 'ttp://www.17track.ne/restapi/handlertrack.ashx';

    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetch(TrackedItem $trackedItem): TrackedItem
    {
        $body = [
            'guid' => '',
            'data' => [
                [
                    'num' => $trackedItem->id,
                ],
            ],
        ];
        $request = new Request(
            'POST',
            self::API_URL,
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            json_encode($body)
        );

        $response = $this->client->send($request);
        $this->parseResponse($response, $trackedItem);
    }

    private function parseResponse(Response $response, TrackedItem $trackedItem)
    {

    }
}
