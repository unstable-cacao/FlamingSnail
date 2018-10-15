<?php
namespace FlamingSnail\Objects\Sheet;


use FlamingSnail\Core\ElementType;
use FlamingSnail\Core\ElementCategory;
use FlamingSnail\Objects\Font;


/**
 * @property string $Text
 * @property Font	$Font
 */
class Label extends TextElement
{
	public function __construct()
	{
		parent::__construct(ElementType::LABEL, ElementCategory::STATIC);
	}
}