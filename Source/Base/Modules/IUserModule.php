<?php
namespace Base\Modules;


use FlamingSnail\Objects\Params\LoginParams;
use FlamingSnail\Objects\User;


interface IUserModule
{
    public function getUser(LoginParams $params): User;
}