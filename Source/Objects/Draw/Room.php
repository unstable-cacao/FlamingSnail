<?php
namespace FlamingSnail\Objects\Draw;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string	$ID
 * @property int	$Revision
 * @property array	$Data
 */
class Room extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'		=> LiteSetup::createString(null),
			'Revision'	=> LiteSetup::createInt(-1),
			'Data'		=> LiteSetup::createArray()
		];
	}
}