<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Core\ElementType;
use FlamingSnail\Core\ElementCategory;
use Objection\LiteSetup;


/**
 * @property int $Count
 * @property int $Min
 */
class Dots extends Element
{
	protected function _setup()
	{
		return array_merge(
			parent::_setup(),
			[
				'Count'	=> LiteSetup::createInt(),
				'Min'	=> LiteSetup::createInt()
			]
		);
	}
	
	
	public function __construct()
	{
		parent::__construct(ElementType::DOTS, ElementCategory::INPUT);
	}
}