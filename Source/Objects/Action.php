<?php
namespace FlamingSnail\Objects;


use FlamingSnail\Core\ActionType;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string		$Action
 * @property string[]	$IDs
 * @property mixed		$Value
 */
class Action extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'Action'	=> LiteSetup::createEnum(ActionType::class),
			'IDs'		=> LiteSetup::createArray(),
			'Value'		=> LiteSetup::createMixed(null)
		];
	}
}