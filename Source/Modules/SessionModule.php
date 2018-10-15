<?php
namespace Modules;


use FlamingSnail\Objects\User;
use Modules\ID\SessionIdGenerator;
use Objects\Session;


/**
 * @autoload
 */
class SessionModule
{
    /**
     * @autoload
     * @var \FlamingSnail\Base\DAO\ISessionDAO
     */
    private $sessionDao;
    
    
    public function saveSession(User $user): bool 
    {
        $session = new Session();
        $session->ID = SessionIdGenerator::generate();
        $session->UserID = $user->ID;
        $session->TTL = date('Y-m-d H:i:s', time() + 60 * 60 * 3);
        
        return $this->sessionDao->save($session);
    }
}