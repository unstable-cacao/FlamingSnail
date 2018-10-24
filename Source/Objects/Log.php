<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;
use Objection\Mapper;


/**
 * @property string			$ID
 * @property string			$RevisionID
 * @property string			$GameID
 * @property string|null	$StoryID
 * @property string			$UserID
 * @property string			$Created
 * @property string			$Sequence
 * @property Action[]		$Actions
 */
class Log extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'			=> LiteSetup::createString(),
			'RevisionID'	=> LiteSetup::createString(null),
			'GameID' 		=> LiteSetup::createString(null),
			'StoryID'		=> LiteSetup::createString(null),
			'UserID'		=> LiteSetup::createString(),
			'Created'		=> LiteSetup::createString(),
			'Sequence'		=> LiteSetup::createString(),
			'Actions'		=> LiteSetup::createInstanceArray(Action::class)
		];
	}
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->Sequence = (string)((int)(microtime(true) * 1000000));
	}
	
	
	public function getArray(): array
	{
		$result = Mapper::getArrayFor($this);
		
		$result['_id'] = $result['ID'];
		unset($result['ID']);
		
		if ($result['RevisionID'])
		{
			$result['_rev'] = $result['RevisionID'];
		}
		
		unset($result['RevisionID']);
		
		return $result;
	}
}