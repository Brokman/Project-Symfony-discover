<?php
namespace App\EventSubscriber;

use App\Controller\SecurityController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\SecurityEvents;

class LoginSubscriber implements EventSubscriberInterface
{

    /**
     * @var SecurityController $securityController
     */
    private $securityController;

    public function __construct(SecurityController $securityController)
    {
        $this->securityController = $securityController;
    }

    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            SecurityEvents::INTERACTIVE_LOGIN => 'onLogin',
            Symfony\Component\Security\Http\Event\DeauthenticatedEvent::class => 'onLogout'
        ];
    }


    public function onLogin()
    {
        $this->securityController->authentificationMessages('success', "You are now logged in");
    }

    public function onLogout()
    {
        $this->securityController->authentificationMessages('failed', "You are now logged out");
    }
}