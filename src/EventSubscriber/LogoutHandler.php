<?php

namespace App\EventSubscriber;

use App\Controller\SecurityController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class LogoutHandler implements LogoutSuccessHandlerInterface
{
    /**
     * @var SecurityController $securityController
     */
    private $securityController;

    public function __construct(SecurityController $securityController)
    {
        $this->securityController = $securityController;
    }

    public function onLogoutSuccess(Request $request) 
    {
        // $referer = $request->headers->get('referer');
        // $request->getSession()->setFlash('success', 'Wylogowano');
        // return new RedirectResponse($referer);

        $this->securityController->authentificationMessages('failed', "You are now logged out");
        return $this->securityController->logout();
    }
}