<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ISheetDAO;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Objects\Sheet;
use Objection\Mapper;
use Snuggle\Base\IConnector;


class SheetDAO implements ISheetDAO
{
    public const DB_NAME = 'Sheet';
    
    
    /** @var IConnector */
    private $connector;
    
    
    public function __construct()
    {
        $this->connector = CouchDBConnector::conn();
    }
    
    
    public function load(string $ID): ?Sheet
    {
        $data = $this->connector->get()->doc(self::DB_NAME, $ID)->queryJson();
        
        if (!$data)
            return null;
    
        $data['ID'] = $data['_id'];
        unset($data['_id']);
        
        /** @var Sheet $sheet */
        $sheet = Mapper::getObjectFrom(Sheet::class, $data);
        
        return $sheet;
    }
    
    public function save(Sheet $sheet): bool
    {
        $data = $sheet->toArray();
        $data['_id'] = $data['ID'];
        unset($data['ID']);
        
        return $this->connector
            ->store()
            ->data($data)
            ->into(self::DB_NAME)
            ->overrideConflict()
            ->execute()
            ->isSuccessful();
    }
}