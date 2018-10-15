<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Objects\Font;
use Objection\LiteSetup;


/**
 * @property string $Text
 * @property Font	$Font
 * @property int	$MaxLength
 */
abstract class TextElement extends Element
{
	protected function _setup()
	{
		return array_merge(
			parent::_setup(),
			[
				'Text'		=> LiteSetup::createString(),
				'Font'		=> LiteSetup::createInstanceOf(Font::class)
			]
		);
	}
}