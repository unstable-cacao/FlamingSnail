<?php
namespace FlamingSnail\Base\DAO\Log;


use FlamingSnail\Objects\Action;
use FlamingSnail\Objects\Log;


interface ILogBuilder
{
	public function setGameID(string $ID): ILogBuilder;
	public function setStoryID(string $ID): ILogBuilder;
	public function setUserID(string $ID): ILogBuilder;
	public function addAction(Action $action): ILogBuilder;
	public function addActions(array $actions): ILogBuilder;
	public function createAction(string $type, array $IDs, $value = null): ILogBuilder;
	public function save(): Log;
}