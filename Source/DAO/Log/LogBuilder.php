<?php
namespace FlamingSnail\DAO\Log;


use FlamingSnail\Base\DAO\ILogSaveDAO;
use FlamingSnail\Base\DAO\Log\ILogBuilder;
use FlamingSnail\Objects\Action;
use FlamingSnail\Objects\Log;


class LogBuilder implements ILogBuilder
{
	/** @var Log */
	private $object;
	
	/** @var ILogSaveDAO */
	private $dao;
	
	
	public function __construct(ILogSaveDAO $dao)
	{
		$this->object = new Log();
		$this->dao = $dao;
	}
	
	
	public function setGameID(string $id): ILogBuilder
	{
		$this->object->GameID = $id;
		return $this;
	}
	
	public function setStoryID(string $id): ILogBuilder
	{
		$this->object->StoryID = $id;
		return $this;
	}
	
	public function setUserID(string $id): ILogBuilder
	{
		$this->object->UserID = $id;
		return $this;
	}
	
	public function addAction(Action $action): ILogBuilder
	{
		$this->object->Actions[] = $action;
		return $this;
	}
	
	public function addActions(array $actions): ILogBuilder
	{
		$this->object->Actions = array_merge($this->object->Actions, $actions);
		return $this;
	}
	
	public function createAction(string $type, array $ids, $value = null): ILogBuilder
	{
		$action = new Action();
		$action->Action = $type;
		$action->IDs = $ids;
		$action->Value = $value;
		
		return $this->addAction($action);
	}
	
	public function save(): Log
	{
		$this->dao->save($this->object);
		return $this->object;
	}
}