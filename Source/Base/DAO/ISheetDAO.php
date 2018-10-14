<?php
namespace FlamingSnail\Base\DAO;


use FlamingSnail\Objects\Sheet;
use FlamingSnail\Objects\User;


interface ISheetDAO
{
	public function get(string $ID): ?Sheet;
	public function save(Sheet $sheet): void;
	public function create(string $userID): Sheet;
	
	/**
	 * @param string $userID
	 * @param int $from
	 * @param int $to
	 * @return Sheet[]
	 */
	public function list(string $userID, int $from, int $to): array;
	
	public function count(string $userID): int;
}