<?php
namespace FlamingSnail\Modules;


use FlamingSnail\Objects\Params\LoginParams;
use FlamingSnail\Objects\User;


/**
 * @autoload
 */
class UserModule
{
    /** 
     * @autoload
     * @var \FlamingSnail\Base\DAO\IUserDAO 
     */
    private $userDao;
    
    
    public function getUser(LoginParams $params): User
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
            throw new \Exception("User was not found");
    
        if (!password_verify($params->password, $user->Password))
            throw new \Exception("Invalid credentials");
        
        return $user;
    }
}