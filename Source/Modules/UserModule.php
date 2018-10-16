<?php
namespace FlamingSnail\Modules;


use FlamingSnail\Base\Modules\IUserModule;
use FlamingSnail\Objects\Params\LoginParams;
use FlamingSnail\Objects\User;


/**
 * @autoload
 */
class UserModule implements IUserModule
{
	/** 
	 * @autoload
	 * @var \FlamingSnail\Base\DAO\IUserDAO 
	 */
	private $userDao;
	
	
	public function getUserByLoginParams(LoginParams $params): User
	{
		if ($params->isEmail())
		{
			$user = $this->userDao->loadByEmail($params->identifier);
		}
		else
		{
			$user = $this->userDao->loadByUsername($params->identifier);
		}
		
		if (!$user)
			throw new \Exception("User was not found", 404);
	
		if (!password_verify($params->password, $user->Password))
			throw new \Exception("Invalid credentials");
		
		return $user;
	}
	
	public function getUserByID(int $ID): User
	{
		$user = $this->userDao->load($ID);
		
		if (!$user)
			throw new \Exception("User with ID $ID was not found", 404);
		
		return $user;
	}
	
	public function saveUser(User $user): bool
	{
		return $this->userDao->save($user);
	}
}