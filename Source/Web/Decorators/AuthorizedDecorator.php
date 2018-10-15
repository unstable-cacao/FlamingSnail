<?php
namespace FlamingSnail\Web\Decorators;


use Base\Modules\ISessionModule;
use Base\Modules\IUserModule;
use FlamingSnail\Objects\User;
use Narrator\INarrator;
use WebCore\IWebRequest;


class AuthorizedDecorator
{
    public function before(
        IWebRequest $request, 
        ISessionModule $sessionModule, 
        IUserModule $userModule, 
        INarrator $narrator
    )
    {
        $sid = $request->getCookie('sid');
        
        if (!$sid)
            throw new \Exception("User not logged in", 403);
        
        $session = $sessionModule->getSessionByID($sid);
        
        if ($session->isTimedOut())
            throw new \Exception("User session timed out", 403);
        
        $user = $userModule->getUserByID($session->ID);
        
        $narrator->params()->byType(User::class, $user);
    }
}