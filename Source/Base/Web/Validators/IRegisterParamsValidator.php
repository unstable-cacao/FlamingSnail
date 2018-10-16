<?php
namespace FlamingSnail\Base\Web\Validators;


use FlamingSnail\Objects\User;
use WebCore\IInput;


interface IRegisterParamsValidator
{
    public function validate(IInput $input): User;
}