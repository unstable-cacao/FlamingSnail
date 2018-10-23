<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string $ID
 * @property string $RevisionID
 * @property string $Created
 * @property string $Modified
 * @property string $SheerID
 * @property array  $Fields
 */
class Page extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'			=> LiteSetup::createString(null),
			'RevisionID'	=> LiteSetup::createString(null),
			'Created'		=> LiteSetup::createString(),
			'Modified'		=> LiteSetup::createString(),
			'SheetID'	    => LiteSetup::createString(),
			'Fields'		=> LiteSetup::createArray()
		];
	}
}