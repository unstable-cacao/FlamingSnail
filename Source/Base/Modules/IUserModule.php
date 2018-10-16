<?php
namespace FlamingSnail\Base\Modules;


use FlamingSnail\Objects\Params\LoginParams;
use FlamingSnail\Objects\User;


/**
 * @skeleton
 */
interface IUserModule
{
	public function getUserByLoginParams(LoginParams $params): User;
	public function getUserByID(int $ID): User;
	public function saveUser(User $user): bool;
}