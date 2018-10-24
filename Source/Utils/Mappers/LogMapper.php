<?php
namespace FlamingSnail\Utils\Mappers;


use Cartograph\Base\IMapper;
use FlamingSnail\Cartograph;
use FlamingSnail\Objects\Action;
use FlamingSnail\Objects\Log;
use Objection\Mapper;


class LogMapper implements IMapper
{
	/**
	 * @map
	 */
	public static function arrayToLog(array $data): Log
	{
		$actions = $data['Actions'];
		unset($data['Actions']);
		
		$data['ID'] = $data['_id'];
		unset($data['_id']);
		
		$data['RevisionID'] = $data['_rev'];
		unset($data['_rev']);
		
		/** @var Log $sheet */
		$sheet = Mapper::getObjectFrom(Log::class, $data);
		
		if ($actions) {
			$sheet->Actions = Cartograph::cartograph()
				->map()
				->fromArray($actions)
				->into(Action::class);
		}
		
		return $sheet;
	}
	
	/**
	 * @map
	 */
	public static function arrayToAction(array $data): Action
	{
		return Mapper::getObjectFrom(Action::class, $data);
	}
}