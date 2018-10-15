<?php
namespace FlamingSnail\Web\Controllers;


use Base\Modules\ISessionModule;
use Base\Modules\IUserModule;
use FlamingSnail\Base\Web\Validators\ILoginParamsValidator;
use FlamingSnail\DAO\UserDAO;
use FlamingSnail\Objects\User;
use WebCore\IWebRequest;


class AuthenticationController
{
    public function onException(\Throwable $exception)
    {
        throw $exception;
    }
    
    public function login(
        IWebRequest $request, 
        ILoginParamsValidator $validator, 
        IUserModule $userModule, 
        ISessionModule $sessionModule
    )
    {
        $params = $validator->validate($request->getPost());
        $user = $userModule->getUser($params);
        $sessionModule->saveSession($user);
        
        return 'Hello ' . $user->Username;
    }
    
    public function register(IWebRequest $request)
    {
        $username = $request->getParam('username');
        $password = $request->getParam('password');
        $email = $request->getParam('email');
        
        if (!$username || !$password || !$email)
            throw new \Exception("All fields are required");
        
        $user = new User();
        $user->Username = $username;
        $user->Email = $email;
        $user->Password = password_hash($password, PASSWORD_BCRYPT);
        
        $dao = new UserDAO();
        $dao->save($user);
        
        return 'User saved';
    }
}