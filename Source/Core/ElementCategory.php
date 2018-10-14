<?php
namespace FlamingSnail\Core;


use Traitor\TEnum;


class ElementCategory
{
	use TEnum;
	
	
	public const STATIC		= 'static';
	public const INPUT		= 'input';
	public const CALCULATED	= 'calculated';
}