<?php
namespace FlamingSnail\DAO;


use FlamingSnail\CouchDBConnector;
use Snuggle\Base\IConnector;


class PageDAO
{
    private static $DBName = 'page';
    
    
    /** @var IConnector */
    private $connector;
    
    
    public function __construct()
    {
        $this->connector = CouchDBConnector::conn();
    }
}