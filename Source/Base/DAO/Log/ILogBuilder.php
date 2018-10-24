<?php
namespace FlamingSnail\Base\DAO\Log;


use FlamingSnail\Objects\Action;
use FlamingSnail\Objects\Log;


interface ILogBuilder
{
	public function setGameID(string $id): ILogBuilder;
	public function setStoryID(string $id): ILogBuilder;
	public function setUserID(string $id): ILogBuilder;
	public function addAction(Action $action): ILogBuilder;
	public function addActions(array $actions): ILogBuilder;
	public function createAction(string $type, array $ids, $value = null): ILogBuilder;
	public function save(): Log;
}