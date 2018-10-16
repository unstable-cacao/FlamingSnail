<?php
namespace FlamingSnail\Modules;


use FlamingSnail\Base\Modules\ISessionModule;
use FlamingSnail\Objects\User;
use FlamingSnail\Modules\ID\SessionIdGenerator;
use FlamingSnail\Objects\Session;


/**
 * @autoload
 */
class SessionModule implements ISessionModule
{
	/**
	 * @autoload
	 * @var \FlamingSnail\Base\DAO\ISessionDAO
	 */
	private $sessionDao;
	
	
	public function createSession(User $user): Session 
	{
		$session = new Session();
		$session->ID = SessionIdGenerator::generate();
		$session->UserID = $user->ID;
		$session->TTL = date('Y-m-d H:i:s', time() + 60 * 60 * 3);
	
		$this->sessionDao->save($session);
		
		return $session;
	}
	
	public function getSessionByID(string $sid): Session
	{
		$session = $this->sessionDao->load($sid);
		
		if (!$session)
			throw new \Exception("Session with ID $sid was not found", 404);
		
		return $session;
	}
}