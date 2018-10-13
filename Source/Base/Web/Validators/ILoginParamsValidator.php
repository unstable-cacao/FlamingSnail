<?php
namespace FlamingSnail\Base\Web\Validators;


use FlamingSnail\Objects\Params\LoginParams;
use WebCore\IInput;


interface ILoginParamsValidator
{
	public function validate(IInput $input): LoginParams;
}