<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ISessionDAO;
use FlamingSnail\MySQLConnector;
use FlamingSnail\Objects\Session;
use Squid\MySql\Impl\Connectors\Object\Generic\GenericIdConnector;


class SessionDAO implements ISessionDAO
{
    /** @var GenericIdConnector */
    private $connector;
    
    
    public function __construct()
    {
        $this->connector = new GenericIdConnector();
        $this->connector
            ->setConnector(MySQLConnector::conn())
            ->setObjectMap(Session::class, ['Created', 'Modified'])
            ->setTable('Session')
            ->setIdKey('ID');
    }
    
    
    public function load(string $ID): ?Session
    {
        return $this->connector->loadById($ID);
    }
    
    public function save(Session $session): bool
    {
        return $this->connector->save($session);
    }
}