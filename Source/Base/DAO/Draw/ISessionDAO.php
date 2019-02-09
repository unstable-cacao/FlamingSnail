<?php
namespace FlamingSnail\Base\DAO\Draw;


use FlamingSnail\Objects\Draw\Session;


interface ISessionDAO
{
	public function load(string $id): ?Session;
	public function save(Session $session): bool;
}