<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Base\DAO\Log\ILogBuilder;
use FlamingSnail\Objects\Log;


interface ILogDAO extends ILogSaveDAO
{
	public function getBuilder(): ILogBuilder;
	public function load(string $ID): ?Log;
}