<?php
namespace FlamingSnail\Base\Modules;


use FlamingSnail\Objects\User;
use FlamingSnail\Objects\Session;


/**
 * @skeleton
 */
interface ISessionModule
{
    public function saveSession(User $user): bool;
    public function getSessionByID(string $sid): Session;
}