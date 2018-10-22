<?php
namespace FlamingSnail\Utils\Mappers;


use FlamingSnail\Core\ElementCategory;
use FlamingSnail\Core\ElementType;
use FlamingSnail\Objects\Sheet\Dots;
use FlamingSnail\Objects\Sheet\Image;
use FlamingSnail\Objects\Sheet\Label;
use FlamingSnail\Objects\Sheet\Number;
use FlamingSnail\Objects\Sheet\Text;
use PHPUnit\Framework\TestCase;


class SheetMapperTest extends TestCase
{
	public function test_arrayToXElement_DataEmpty_ReturnEmptyObject()
	{
		self::assertInstanceOf(Dots::class, SheetMapper::arrayToDotsElement([]));
		self::assertInstanceOf(Image::class, SheetMapper::arrayToImageElement([]));
		self::assertInstanceOf(Label::class, SheetMapper::arrayToLabelElement([]));
		self::assertInstanceOf(Number::class, SheetMapper::arrayToNumberElement([]));
		self::assertInstanceOf(Text::class, SheetMapper::arrayToTextElement([]));
	}
	
	public function test_arrayToDotsElement_ReturnDotsElement()
	{
		$data = [
			'Name'		=> 'Test1',
			'Size'		=> ['X' => 5.1, 'Y' => 0.0],
			'Position'	=> ['X' => 0.0, 'Y' => 0.0],
			'ZIndex'	=> 1,
			'Type'		=> ElementType::DOTS,
			'Category'	=> ElementCategory::INPUT,
			'Count'     => 10,
			'Min'       => 1
		];
	
		$result = SheetMapper::arrayToDotsElement($data);
		
		self::assertEquals($data['Name'], $result->Name);
		self::assertEquals($data['Size']['X'], $result->Size->X);
		self::assertEquals($data['Size']['Y'], $result->Size->Y);
		self::assertEquals($data['Position']['X'], $result->Position->X);
		self::assertEquals($data['Position']['Y'], $result->Position->Y);
		self::assertEquals($data['ZIndex'], $result->ZIndex);
		self::assertEquals($data['Type'], $result->Type);
		self::assertEquals($data['Category'], $result->Category);
		self::assertEquals($data['Count'], $result->Count);
		self::assertEquals($data['Min'], $result->Min);
	}
	
	public function test_arrayToImageElement_ReturnImageElement()
	{
		$data = [
			'Name'		=> 'Test1',
			'Size'		=> ['X' => 5.1, 'Y' => 0.0],
			'Position'	=> ['X' => 0.0, 'Y' => 0.0],
			'ZIndex'	=> 1,
			'Type'		=> ElementType::IMAGE,
			'Category'	=> ElementCategory::STATIC,
			'Source'    => __DIR__,
		];
	
		$result = SheetMapper::arrayToImageElement($data);
	
		self::assertEquals($data['Name'], $result->Name);
		self::assertEquals($data['Size']['X'], $result->Size->X);
		self::assertEquals($data['Size']['Y'], $result->Size->Y);
		self::assertEquals($data['Position']['X'], $result->Position->X);
		self::assertEquals($data['Position']['Y'], $result->Position->Y);
		self::assertEquals($data['ZIndex'], $result->ZIndex);
		self::assertEquals($data['Type'], $result->Type);
		self::assertEquals($data['Category'], $result->Category);
		self::assertEquals($data['Source'], $result->Source);
	}
	
	public function test_arrayToLabelElement_ReturnLabelElement()
	{
		$data = [
			'Name'		=> 'Test1',
			'Size'		=> ['X' => 5.1, 'Y' => 0.0],
			'Position'	=> ['X' => 0.0, 'Y' => 0.0],
			'ZIndex'	=> 1,
			'Type'		=> ElementType::LABEL,
			'Category'	=> ElementCategory::STATIC
		];
	
		$result = SheetMapper::arrayToLabelElement($data);
	
		self::assertEquals($data['Name'], $result->Name);
		self::assertEquals($data['Size']['X'], $result->Size->X);
		self::assertEquals($data['Size']['Y'], $result->Size->Y);
		self::assertEquals($data['Position']['X'], $result->Position->X);
		self::assertEquals($data['Position']['Y'], $result->Position->Y);
		self::assertEquals($data['ZIndex'], $result->ZIndex);
		self::assertEquals($data['Type'], $result->Type);
		self::assertEquals($data['Category'], $result->Category);
	}
	
	public function test_arrayToNumberElement_ReturnNumberElement()
	{
		$data = [
			'Name'		    => 'Test1',
			'Size'		    => ['X' => 5.1, 'Y' => 0.0],
			'Position'	    => ['X' => 0.0, 'Y' => 0.0],
			'ZIndex'	    => 1,
			'Type'		    => ElementType::NUMBER,
			'Category'	    => ElementCategory::INPUT,
			'MinValue'		=> 5,
			'MaxValue'		=> 20,
			'Step'			=> 1.0,
			'DefaultValue'	=> 6
		];
	
		$result = SheetMapper::arrayToNumberElement($data);
	
		self::assertEquals($data['Name'], $result->Name);
		self::assertEquals($data['Size']['X'], $result->Size->X);
		self::assertEquals($data['Size']['Y'], $result->Size->Y);
		self::assertEquals($data['Position']['X'], $result->Position->X);
		self::assertEquals($data['Position']['Y'], $result->Position->Y);
		self::assertEquals($data['ZIndex'], $result->ZIndex);
		self::assertEquals($data['Type'], $result->Type);
		self::assertEquals($data['Category'], $result->Category);
		self::assertEquals($data['MinValue'], $result->MinValue);
		self::assertEquals($data['MaxValue'], $result->MaxValue);
		self::assertEquals($data['Step'], $result->Step);
		self::assertEquals($data['DefaultValue'], $result->DefaultValue);
	}
	
	public function test_arrayToTextElement_ReturnTextElement()
	{
		$data = [
			'Name'		=> 'Test1',
			'Size'		=> ['X' => 5.1, 'Y' => 0.0],
			'Position'	=> ['X' => 0.0, 'Y' => 0.0],
			'ZIndex'	=> 1,
			'Type'		=> ElementType::TEXT,
			'Category'	=> ElementCategory::INPUT,
			'MaxLength' => 100
		];
	
		$result = SheetMapper::arrayToTextElement($data);
	
		self::assertEquals($data['Name'], $result->Name);
		self::assertEquals($data['Size']['X'], $result->Size->X);
		self::assertEquals($data['Size']['Y'], $result->Size->Y);
		self::assertEquals($data['Position']['X'], $result->Position->X);
		self::assertEquals($data['Position']['Y'], $result->Position->Y);
		self::assertEquals($data['ZIndex'], $result->ZIndex);
		self::assertEquals($data['Type'], $result->Type);
		self::assertEquals($data['Category'], $result->Category);
		self::assertEquals($data['MaxLength'], $result->MaxLength);
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function test_arrayToElement_EmptyData_ExceptionThrown()
	{
		SheetMapper::arrayToElement([]);
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function test_arrayToElement_TypeNotFound_ExceptionThrown()
	{
		SheetMapper::arrayToElement(['Type' => 'SomeElement']);
	}
	
	public function test_arrayToElement_ReturnCorrectElement()
	{
		self::assertInstanceOf(Dots::class, SheetMapper::arrayToElement(['Type' => ElementType::DOTS]));
		self::assertInstanceOf(Image::class, SheetMapper::arrayToElement(['Type' => ElementType::IMAGE]));
		self::assertInstanceOf(Label::class, SheetMapper::arrayToElement(['Type' => ElementType::LABEL]));
		self::assertInstanceOf(Number::class, SheetMapper::arrayToElement(['Type' => ElementType::NUMBER]));
		self::assertInstanceOf(Text::class, SheetMapper::arrayToElement(['Type' => ElementType::TEXT]));
	}
	
	public function test_arrayToSheet_MapSheetCorrectly()
	{
		$sheetData = [
			'_id'			=> 'test',
			'_rev'			=> 'test',
			'Name'			=> 'Test',
			'Dimensions'	=> ['X' => 2.0, 'Y' => 3.0],
			'Elements'		=> [
				[
					'Name'		=> 'Element1',
					'Size'		=> ['X' => 1.0, 'Y' => 1.0],
					'Position'	=> ['X' => 0.0, 'Y' => 0.0],
					'ZIndex'	=> 1,
					'Type'		=> ElementType::LABEL,
					'Category'	=> ElementCategory::STATIC
				],
				[
					'Name'		=> 'Element2',
					'Size'		=> ['X' => 1.0, 'Y' => 2.0],
					'Position'	=> ['X' => 1.0, 'Y' => 0.0],
					'ZIndex'	=> 1,
					'Type'		=> ElementType::LABEL,
					'Category'	=> ElementCategory::STATIC
				]
			]
		];
		
		$result = SheetMapper::arrayToSheet($sheetData);
		
		self::assertEquals($sheetData['_id'], $result->ID);
		self::assertEquals($sheetData['_rev'], $result->RevisionID);
		self::assertEquals($sheetData['Name'], $result->Name);
		self::assertEquals($sheetData['Dimensions']['X'], $result->Dimensions->X);
		self::assertEquals($sheetData['Dimensions']['Y'], $result->Dimensions->Y);
		self::assertCount(2, $result->Elements);
		
		self::assertEquals($sheetData['Elements'][0]['Name'], $result->Elements[0]->Name);
		self::assertEquals($sheetData['Elements'][0]['Size']['X'], $result->Elements[0]->Size->X);
		self::assertEquals($sheetData['Elements'][0]['Size']['Y'], $result->Elements[0]->Size->Y);
		self::assertEquals($sheetData['Elements'][0]['Position']['X'], $result->Elements[0]->Position->X);
		self::assertEquals($sheetData['Elements'][0]['Position']['Y'], $result->Elements[0]->Position->Y);
		self::assertEquals($sheetData['Elements'][0]['ZIndex'], $result->Elements[0]->ZIndex);
		self::assertEquals($sheetData['Elements'][0]['Type'], $result->Elements[0]->Type);
		self::assertEquals($sheetData['Elements'][0]['Category'], $result->Elements[0]->Category);
	
		self::assertEquals($sheetData['Elements'][1]['Name'], $result->Elements[1]->Name);
		self::assertEquals($sheetData['Elements'][1]['Size']['X'], $result->Elements[1]->Size->X);
		self::assertEquals($sheetData['Elements'][1]['Size']['Y'], $result->Elements[1]->Size->Y);
		self::assertEquals($sheetData['Elements'][1]['Position']['X'], $result->Elements[1]->Position->X);
		self::assertEquals($sheetData['Elements'][1]['Position']['Y'], $result->Elements[1]->Position->Y);
		self::assertEquals($sheetData['Elements'][1]['ZIndex'], $result->Elements[1]->ZIndex);
		self::assertEquals($sheetData['Elements'][1]['Type'], $result->Elements[1]->Type);
		self::assertEquals($sheetData['Elements'][1]['Category'], $result->Elements[1]->Category);
	}
}