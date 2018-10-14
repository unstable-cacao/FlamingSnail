<?php
namespace FlamingSnail\Core;


use Traitor\TEnum;


class FontModifiers
{
	use TEnum;
	
	
	public const BOLD		= 'bold';
	public const ITALIC		= 'italic';
	public const UNDERLINE	= 'underline';
	public const STRIKE		= 'strike';
}