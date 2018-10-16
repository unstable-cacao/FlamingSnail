<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string $ID
 * @property string $Created
 * @property string $Modified
 * @property int    $UserID
 * @property string $TTL
 */
class Session extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'        => LiteSetup::createString(),
			'Created'   => LiteSetup::createString(),
			'Modified'  => LiteSetup::createString(),
			'UserID'    => LiteSetup::createInt(),
			'TTL'       => LiteSetup::createString()
		];
	}
	
	
	public function isTimedOut(): bool 
	{
		return strtotime($this->TTL) < time();
	}
}