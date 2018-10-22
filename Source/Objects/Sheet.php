<?php
namespace FlamingSnail\Objects;


use FlamingSnail\Objects\Sheet\Element;
use Objection\LiteObject;
use Objection\LiteSetup;
use Objection\Mapper;


/**
 * @property string|null	$ID
 * @property string|null	$RevisionID
 * @property string			$Created
 * @property string			$Modified
 * @property string			$Name
 * @property Vector			$Dimensions
 * @property Element[]		$Elements
 */
class Sheet extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID'			=> LiteSetup::createString(null),
			'RevisionID'	=> LiteSetup::createString(null),
			'Created'		=> LiteSetup::createString(),
			'Modified'		=> LiteSetup::createString(),
			'Name'			=> LiteSetup::createString(),
			'Dimensions'	=> LiteSetup::createInstanceOf(Vector::class),
			'Elements'		=> LiteSetup::createInstanceArray(Element::class)
		];
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