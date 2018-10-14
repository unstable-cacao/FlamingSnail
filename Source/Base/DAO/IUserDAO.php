<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\User;


interface IUserDAO
{
    public function loadByEmail(string $email): ?User;
    public function loadByUsername(string $username): ?User;
    public function save(User $user): bool;
}