<?php

namespace App\Listener;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\Event;
use App\EventSubscriber\LoginSubscriber;

class SecondDispatcher extends Event
{
    /**
     * @var EventDispatcher $dispatcher
     */
    private $dispatcher;

    /**
     * @var StoreSubscriber $subscriber
     */
    private $subscriber;

    public function __construct(EventDispatcher $dispatcher, LoginSubscriber $subscriber)
    {
        $this->dispatcher = $dispatcher;
        $this->subscriber = $subscriber;
        $this->dispatcher->addSubscriber($this->subscriber);
    }
}