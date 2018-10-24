<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Log;


interface ILogSaveDAO
{
	public function save(Log $log): bool;
}