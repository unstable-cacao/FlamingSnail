<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;
use Objection\Mapper;


/**
 * @property string			$ID
 * @property string			$RevisionID
 * @property int			$GameID
 * @property string|null	$StoryID
 * @property int			$UserID
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
			'ID'			=> LiteSetup::createString(null),
			'RevisionID'	=> LiteSetup::createString(null),
			'GameID' 		=> LiteSetup::createInt(),
			'StoryID'		=> LiteSetup::createString(null),
			'UserID'		=> LiteSetup::createInt(),
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