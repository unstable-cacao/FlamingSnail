<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int		$ID
 * @property string		$Created
 * @property string		$Modified
 * @property int		$GameID
 * @property int		$EntityTypeID
 * @property int		$CreatorID
 * @property string		$Name
 * @property string[]	$PageIDs
 */
class Entity extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'			=> LiteSetup::createInt(null),
			'Created'		=> LiteSetup::createString(),
			'Modified'		=> LiteSetup::createString(),
			'GameID'		=> LiteSetup::createInt(),
			'EntityTypeID'	=> LiteSetup::createInt(),
			'CreatorID'		=> LiteSetup::createInt(),
			'Name'			=> LiteSetup::createString(),
			'PageIDs'		=> LiteSetup::createArray()
		];
	}
}