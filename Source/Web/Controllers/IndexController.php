<?php
namespace FlamingSnail\Web\Controllers;


use FlamingSnail\Objects\User;


class IndexController
{
    public function index(User $user)
    {
        return 'Hello ' . $user->Username;
    }
}