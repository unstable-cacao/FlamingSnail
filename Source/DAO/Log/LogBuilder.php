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
	
	
	public function setGameID(string $ID): ILogBuilder
	{
		$this->object->GameID = $ID;
		return $this;
	}
	
	public function setStoryID(string $ID): ILogBuilder
	{
		$this->object->StoryID = $ID;
		return $this;
	}
	
	public function setUserID(string $ID): ILogBuilder
	{
		$this->object->UserID = $ID;
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
	
	public function createAction(string $type, array $IDs, $value = null): ILogBuilder
	{
		$action = new Action();
		$action->Action = $type;
		$action->IDs = $IDs;
		$action->Value = $value;
		
		return $this->addAction($action);
	}
	
	public function save(): Log
	{
		$this->dao->save($this->object);
		return $this->object;
	}
}