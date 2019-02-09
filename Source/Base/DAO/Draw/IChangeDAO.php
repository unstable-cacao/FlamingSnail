<?php
namespace FlamingSnail\Base\DAO\Draw;


use FlamingSnail\Objects\Draw\Change;


interface IChangeDAO
{
	public function save(Change $change): bool;
}