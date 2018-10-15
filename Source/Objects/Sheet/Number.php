<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Core\ElementType;
use FlamingSnail\Core\ElementCategory;
use Objection\LiteSetup;


/**
 * @property float $MinValue
 * @property float $MaxValue
 * @property float $Step
 * @property float $DefaultValue
 */
class Number extends TextElement
{
	protected function _setup()
	{
		return array_merge(
			parent::_setup(),
			[
				'MinValue'		=> LiteSetup::createDouble(),
				'MaxValue'		=> LiteSetup::createDouble(),
				'Step'			=> LiteSetup::createDouble(),
				'DefaultValue'	=> LiteSetup::createDouble()
			]
		);
	}
	
	
	public function __construct()
	{
		parent::__construct(ElementType::NUMBER, ElementCategory::INPUT);
	}
}