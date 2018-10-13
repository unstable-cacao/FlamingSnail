<?php
namespace FlamingSnail\Objects\Params;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string	$identifier
 * @property string $password
 */
class LoginParams extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'identifier' 	=> LiteSetup::createString(),
			'password' 		=> LiteSetup::createString()
		];
	}
	
	
	public function isEmail(): bool 
	{
		return strpos($this->identifier, '@') !== false;
	}
}