<?php
namespace FlamingSnail\Base\DAO;


use Objects\Session;


interface ISessionDAO
{
    public function load(string $ID): ?Session;
    public function save(Session $session): bool;
}