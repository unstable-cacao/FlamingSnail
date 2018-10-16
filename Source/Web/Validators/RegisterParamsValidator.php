<?php
namespace FlamingSnail\Web\Validators;


use FlamingSnail\Base\Web\Validators\IRegisterParamsValidator;
use FlamingSnail\Objects\User;
use WebCore\IInput;


class RegisterParamsValidator implements IRegisterParamsValidator
{
    public function validate(IInput $input): User
    {
        $username = $input->require('username');
        $password = $input->require('password');
        $email = $input->require('email');
        
        if (!$username || !$password || !$email)
            throw new \Exception("Username, password and email are required");
        
        $user = new User();
        $user->Username = $username;
        $user->Password = password_hash($password, PASSWORD_BCRYPT);
        $user->Email = $email;
        
        return $user;
    }
}