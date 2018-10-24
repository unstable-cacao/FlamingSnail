<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Session;


/** 
 * @skeleton 
 */
interface ISessionDAO
{
	public function load(string $id): ?Session;
	public function save(Session $session): bool;
}