<?php
namespace FlamingSnail\DAO;


use FlamingSnail\Base\DAO\ISheetDAO;
use FlamingSnail\CouchDBConnector;
use FlamingSnail\Objects\Sheet;
use FlamingSnail\Objects\Vector;
use PHPUnit\Framework\TestCase;


class SheetDAOTest extends TestCase
{
	private static $DBName = 'sheettest';
	
	/** @var ISheetDAO */
	private static $dao;
	
	
	public static function setUpBeforeClass()
	{
		if (CouchDBConnector::conn()->db()->exists(self::$DBName)) {
			CouchDBConnector::conn()->db()->drop(self::$DBName);
		}
		
		CouchDBConnector::conn()->db()->create(self::$DBName);
		self::$dao = setStaticDataMember(SheetDAO::class, 'DBName', self::$DBName);
	}
	
	public static function tearDownAfterClass()
	{
		CouchDBConnector::conn()->db()->drop(self::$DBName);
	}
	
	
	public function setUp()
	{
		CouchDBConnector::conn()->db()->drop(self::$DBName);
		CouchDBConnector::conn()->db()->create(self::$DBName);
	}
	
	
	public function test_load_ItemNotExists_ReturnNull()
	{
		self::assertNull(self::$dao->load('test1'));
	}
	
	public function test_load_ItemExists_ReturnItem()
	{
		$sheetData = [
			'_id'			=> 'test2',
			'Name'			=> 'Test2',
			'Dimensions'	=> ['X' => 2.0, 'Y' => 3.0],
			'Elements'		=> [
				[
					'Name'		=> 'Element1',
					'Size'		=> ['X' => 1.0, 'Y' => 1.0],
					'Position'	=> ['X' => 0.0, 'Y' => 0.0],
					'ZIndex'	=> 1,
					'Type'		=> 'label',
					'Category'	=> 'static'
				]
			]
		];
	
		CouchDBConnector::conn()->insert()->into(self::$DBName)->data($sheetData)->execute();
		
		$result = self::$dao->load('test2');
		
		self::assertNotNull($result);
		self::assertEquals('test2', $result->ID);
	}
	
	public function test_save_ItemExists_Overridden()
	{
		$sheet = new Sheet();
		$sheet->ID = 'test4';
		$sheet->Name = 'Test4';
		$sheet->Dimensions = new Vector(2.0, 3.0);
	
		self::$dao->save($sheet);
	
		$sheet->Name = 'Test5';
		$sheet->Dimensions->X = 3.2;
	
		self::assertTrue(self::$dao->save($sheet));
	
		$result = self::$dao->load($sheet->ID);
	
		self::assertNotNull($result);
		self::assertEquals($sheet->ID, $result->ID);
		self::assertEquals($sheet->Name, $result->Name);
		self::assertNotEmpty($result->Dimensions);
		self::assertEquals($sheet->Dimensions->X, $result->Dimensions->X);
		self::assertEquals($sheet->Dimensions->Y, $result->Dimensions->Y);
		self::assertEmpty($result->Elements);
	}
	
	public function test_save_ItemNotExists_Saved()
	{
		$sheet = new Sheet();
		$sheet->ID = 'test3';
		$sheet->Name = 'Test3';
		$sheet->Dimensions = new Vector(2.0, 3.0);
		
		$element = new Sheet\Label();
		$element->Name = 'Element1';
		$element->Size = new Vector(1.0);
		$element->Position = new Vector();
		$element->ZIndex = 1;
		$sheet->Elements = [$element];
		
		self::assertTrue(self::$dao->save($sheet));
	
		$result = self::$dao->load($sheet->ID);
	
		self::assertNotNull($result);
		self::assertEquals($sheet->ID, $result->ID);
		self::assertEquals($sheet->Name, $result->Name);
		self::assertNotEmpty($result->Dimensions);
		self::assertEquals($sheet->Dimensions->X, $result->Dimensions->X);
		self::assertEquals($sheet->Dimensions->Y, $result->Dimensions->Y);
		self::assertNotEmpty($result->Elements);
		self::assertEquals($sheet->Elements[0]->Name, $result->Elements[0]->Name);
	}
}