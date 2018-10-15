<?php
namespace Base\Modules;


use FlamingSnail\Objects\Params\LoginParams;
use FlamingSnail\Objects\User;


interface IUserModule
{
    public function getUserByLoginParams(LoginParams $params): User;
    public function getUserByID(int $ID): User;
}