<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property float $X
 * @property float $Y
 */
class Vector extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'X'	=> LiteSetup::createDouble(0.0),
			'Y'	=> LiteSetup::createDouble(0.0)
		];
	}
	
	
	public function __construct(float $x = 0.0, ?float $y = null)
	{
		parent::__construct();
		
		$this->X = $x;
		$this->Y = is_null($y) ? $x : $y;
	}
}