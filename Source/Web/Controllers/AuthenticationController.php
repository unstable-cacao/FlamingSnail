<?php
namespace FlamingSnail\Web\Controllers;


use FlamingSnail\DAO\UserDAO;
use FlamingSnail\Objects\User;
use WebCore\IWebRequest;


class AuthenticationController
{
    public function onException(\Throwable $exception)
    {
        throw $exception;
    }
    
    public function login(IWebRequest $request)
    {
        $username = $request->getParam('username');
        $password = $request->getParam('password');
        $dao = new UserDAO();
        
        if (strpos($username, '@') !== false)
        {
            $user = $dao->loadByEmail($username);
        }
        else
        {
            $user = $dao->loadByUsername($username);
        }
        
        if (!$user)
            throw new \Exception("User not found");
        
        if (!password_verify($password, $user->Password))
            throw new \Exception("Invalid credentials");
        
        return 'Hello world!';
    }
    
    public function register(IWebRequest $request)
    {
        $username = $request->getParam('username');
        $password = $request->getParam('password');
        $passwordVerify = $request->getParam('passwordVerify');
        $email = $request->getParam('email');
        
        if (!$username || !$password || !$passwordVerify || !$email)
            throw new \Exception("All fields are required");
        
        if ($password != $passwordVerify)
            throw new \Exception("Password verification not matched");
        
        $user = new User();
        $user->Username = $username;
        $user->Email = $email;
        $user->Password = password_hash($password, PASSWORD_BCRYPT);
        
        $dao = new UserDAO();
        $dao->save($user);
        
        return 'User saved';
    }
}