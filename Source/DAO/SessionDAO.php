<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ISessionDAO;
use FlamingSnail\MySQLConnector;
use Objects\Session;
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
            ->setGeneratedId('ID');
    }
    
    
    public function load(string $ID): ?Session
    {
        // TODO: Implement load() method.
    }
    
    public function save(Session $session): bool
    {
        // TODO: Implement save() method.
    }
}