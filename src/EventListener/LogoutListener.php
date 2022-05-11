<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutListener
{
    /**
     * @var FlashBagInterface
     */
    private FlashBagInterface $flashBang;

    /**
     * @param SessionInterface $session
     * @return void
     */
    public function __construct(SessionInterface $session)
    {
        $this->flashBag = $session->getFlashBag();
    }
 
    /**
     * @param LogoutEvent $event
     * @return void
     */
    public function onSymfonyComponentSecurityHttpEventLogoutEvent(LogoutEvent $event): void
    {
        $this->flashBag->add('logout', 'logout message');
    }
}