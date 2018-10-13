<?php
namespace FlamingSnail\Web\Validators;


use FlamingSnail\Base\Web\Validators\ILoginParamsValidator;
use FlamingSnail\Objects\Params\LoginParams;
use WebCore\IInput;


class LoginParamsValidator implements ILoginParamsValidator
{
	public function validate(IInput $input): LoginParams
	{
		
	}
}