<?php
namespace FlamingSnail\Base\Modules;


use FlamingSnail\Objects\User;
use FlamingSnail\Objects\Session;


/**
 * @skeleton
 */
interface ISessionModule
{
    public function createSession(User $user): Session;
    public function getSessionByID(string $sid): Session;
}