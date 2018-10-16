<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Session;


/** 
 * @skeleton 
 */
interface ISessionDAO
{
	public function load(string $ID): ?Session;
	public function save(Session $session): bool;
}