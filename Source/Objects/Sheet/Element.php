<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Core\ElementType;
use FlamingSnail\Core\ElementCategory;
use FlamingSnail\Objects\Vector;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property string $Name
 * @property Vector $Size
 * @property Vector $Position
 * @property int	$ZIndex
 * @property string $Type
 * @property string $Category
 */
abstract class Element extends LiteObject
{
	protected function _setup()
	{
		return [
			'Name'		=> LiteSetup::createString(),
			'Size'		=> LiteSetup::createInstanceOf(Vector::class),
			'Position'	=> LiteSetup::createInstanceOf(Vector::class),
			'ZIndex'	=> LiteSetup::createInt(),
			'Type'		=> LiteSetup::createEnum(ElementType::class),
			'Category'	=> LiteSetup::createEnum(ElementCategory::class)
		];
	}
	
	
	public function __construct(string $type, string $category)
	{
		parent::__construct();
		
		$this->Type = $this;
		$this->Category = $category;
	}
}