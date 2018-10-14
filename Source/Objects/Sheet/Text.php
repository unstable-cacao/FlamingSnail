<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Core\ElementType;
use FlamingSnail\Core\ElementCategory;
use Objection\LiteSetup;


/**
 * @property int	$MaxLength
 */
class Text extends TextElement
{
	protected function _setup()
	{
		return array_merge(
			parent::_setup(),
			[
				'MaxLength'	=> LiteSetup::createInt()
			]
		);
	}
	
	
	public function __construct()
	{
		parent::__construct(ElementType::TEXT, ElementCategory::INPUT);
	}
}