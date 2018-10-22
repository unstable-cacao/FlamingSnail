<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Sheet;


interface ISheetDAO
{
	public function load(string $ID): ?Sheet;
	public function save(Sheet $sheet): bool;
}