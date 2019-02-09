<?php
namespace FlamingSnail\Objects\Draw;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string $ID
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
			'ID'		=> LiteSetup::createString(null),
			'Username' 	=> LiteSetup::createString(null),
			'RoomID' 	=> LiteSetup::createString(null)
		];
	}
}