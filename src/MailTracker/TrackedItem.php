<?php

namespace MailTracker;

/**
 * @package MailTracker
 * @author Luis Lopes <josluis.lopes@gmail.com>
 */
class TrackedItem
{
    public $events = [];
    public $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function addTrackEvent(TrackEvent $trackEvent): void
    {
        $this->events[] = $trackEvent;
    }
}
