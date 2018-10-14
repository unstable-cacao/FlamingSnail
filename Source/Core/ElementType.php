<?php
namespace FlamingSnail\Core;


use Traitor\TEnum;


class ElementType
{
	use TEnum;
	
	
	public const LABEL		= 'label';
	public const TEXT		= 'text';
	public const IMAGE		= 'image';
	public const DOTS		= 'dots';
	public const NUMBER		= 'number';
	public const COSTUME	= 'costume';
}