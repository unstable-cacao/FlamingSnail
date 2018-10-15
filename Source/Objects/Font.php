<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string		$Family
 * @property int		$Size
 * @property string 	$Color
 * @property string[]	$Modifiers
 */
class Font extends LiteObject
{
	protected function _setup()
	{
		return [
			'Family'	=> LiteSetup::createString(),
			'Size'		=> LiteSetup::createInt(12),
			'Color'		=> LiteSetup::createString('#000000'),
			'Modifiers'	=> LiteSetup::createArray()
		];
	}
}