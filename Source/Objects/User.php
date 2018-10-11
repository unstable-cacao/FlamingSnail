<?php
namespace FlamingSnail\Objects;


use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int    $ID
 * @property string $Created
 * @property string $Modified
 * @property string $Username
 * @property string $Email
 * @property string $Password
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
            'Created'   => LiteSetup::createString(null),
            'Modified'  => LiteSetup::createString(null),
            'Username'  => LiteSetup::createString(null),
            'Email'     => LiteSetup::createString(null),
            'Password'  => LiteSetup::createString(null)
        ];
    }
}