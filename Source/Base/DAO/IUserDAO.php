<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\User;


/**
 * @skeleton
 */
interface IUserDAO
{
	public function load(int $ID): ?User;
	public function loadByEmail(string $email): ?User;
	public function loadByUsername(string $username): ?User;
	public function save(User $user): bool;
}