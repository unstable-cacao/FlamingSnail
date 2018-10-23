<?php
namespace FlamingSnail\Objects;


use FlamingSnail\Core\GameStatus;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int    $ID
 * @property string $Name
 * @property int    $Creator
 * @property string $Created
 * @property string $Modified
 * @property string $Status
 */
class Game extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'        => LiteSetup::createInt(null),
			'Name'      => LiteSetup::createString(),
			'Creator'   => LiteSetup::createInt(),
			'Created'   => LiteSetup::createString(),
			'Modified'  => LiteSetup::createString(),
			'Status'    => LiteSetup::createEnum(GameStatus::class)
		];
	}
}