<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int|null   $ID
 * @property string		$Created
 * @property string		$Modified
 * @property string		$Username
 * @property string		$Email
 * @property string		$Password
 */
class User extends LiteObject
{
    /**
     * @return array
     */
    protected function _setup()
    {
        return [
            'ID'        => LiteSetup::createInt(null),
            'Created'   => LiteSetup::createString(),
            'Modified'  => LiteSetup::createString(),
            'Username'  => LiteSetup::createString(),
            'Email'     => LiteSetup::createString(),
            'Password'  => LiteSetup::createString()
        ];
    }
}