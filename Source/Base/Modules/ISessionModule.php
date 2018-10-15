<?php
namespace Base\Modules;


use FlamingSnail\Objects\User;
use Objects\Session;


interface ISessionModule
{
    public function saveSession(User $user): bool;
    public function getSessionByID(string $sid): Session;
}