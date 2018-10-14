<?php
namespace FlamingSnail\Web\Validators;


use FlamingSnail\Base\Web\Validators\ILoginParamsValidator;
use FlamingSnail\Objects\Params\LoginParams;
use WebCore\IInput;


class LoginParamsValidator implements ILoginParamsValidator
{
	public function validate(IInput $input): LoginParams
	{
		$username = $input->require('username');
		$password = $input->require('password');
		
		if (!$username || !$password)
		    throw new \Exception("Username and password are required");
		
		$params = new LoginParams();
		$params->identifier = $username;
		$params->password = $password;
		
		return $params;
	}
}