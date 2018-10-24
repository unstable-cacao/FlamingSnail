<?php
namespace FlamingSnail\Objects;


use FlamingSnail\Core\EntityTypeStatus;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int	$ID
 * @property string	$Created
 * @property string	$Modified
 * @property int	$GameID
 * @property int	$CreatorID
 * @property string	$Name
 * @property string	$Status
 */
class EntityType extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'		=> LiteSetup::createInt(null),
			'Created'	=> LiteSetup::createString(),
			'Modified'	=> LiteSetup::createString(),
			'GameID'	=> LiteSetup::createInt(),
			'CreatorID'	=> LiteSetup::createInt(),
			'Name'		=> LiteSetup::createString(),
			'Status'	=> LiteSetup::createEnum(EntityTypeStatus::class)
		];
	}
}