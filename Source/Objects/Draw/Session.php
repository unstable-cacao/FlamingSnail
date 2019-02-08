<?php
namespace FlamingSnail\Objects\Draw;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string $Username
 * @property string $RoomID
 */
class Session extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'Username' 	=> LiteSetup::createString(null),
			'RoomID' 	=> LiteSetup::createString(null)
		];
	}
}