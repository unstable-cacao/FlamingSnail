<?php
namespace FlamingSnail\Web\Controllers;


use FlamingSnail\Base\Modules\ISessionModule;
use FlamingSnail\Base\Modules\IUserModule;
use FlamingSnail\Base\Web\Validators\ILoginParamsValidator;
use FlamingSnail\DAO\UserDAO;
use FlamingSnail\Objects\User;
use WebCore\HTTP\Responses\StandardWebResponse;
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
        $user = $userModule->getUserByLoginParams($params);
        $session = $sessionModule->createSession($user);
        
        $response = new StandardWebResponse();
        $response->setCookieByName('sid', $session->ID);
        $response->setBody('Hello ' . $user->Username);
        
        return $response;
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