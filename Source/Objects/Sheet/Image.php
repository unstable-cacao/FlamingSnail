<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Core\ElementType;
use FlamingSnail\Core\ElementCategory;
use Objection\LiteSetup;


/**
 * @property string $Source
 */
class Image extends Element
{
	protected function _setup()
	{
		return array_merge(
			parent::_setup(),
			[
				'Source'	=> LiteSetup::createString()
			]
		);
	}
	
	
	public function __construct()
	{
		parent::__construct(ElementType::IMAGE, ElementCategory::STATIC);
	}
}