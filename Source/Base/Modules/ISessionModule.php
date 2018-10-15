<?php
namespace Base\Modules;


use FlamingSnail\Objects\User;


interface ISessionModule
{
    public function saveSession(User $user): bool;
}