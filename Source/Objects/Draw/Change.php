<?php
namespace FlamingSnail\Objects\Draw;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string $RoomID
 * @property array 	$Created
 * @property array 	$Updated
 * @property array 	$Deleted
 * @property array 	$Joined
 * @property array 	$Left
 */
class Change extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'RoomID'	=> LiteSetup::createString(null),
			'Created'	=> LiteSetup::createArray(),
			'Updated'	=> LiteSetup::createArray(),
			'Deleted'	=> LiteSetup::createArray(),
			'Joined'	=> LiteSetup::createArray(),
			'Left'		=> LiteSetup::createArray()
		];
	}
}