<?php
namespace FlamingSnail\Utils\Mappers;


use Cartograph\Base\IMapper;
use FlamingSnail\Cartograph;
use FlamingSnail\Core\ElementType;
use FlamingSnail\Objects\Sheet;
use Objection\Mapper;


class SheetMapper implements IMapper
{
	/**
	 * @map
	 */
	public static function arrayToSheet(array $data): Sheet
	{
		$elements = $data['Elements'];
		unset($data['Elements']);
	
		$data['ID'] = $data['_id'];
		unset($data['_id']);
	
		$data['RevisionID'] = $data['_rev'];
		unset($data['_rev']);
		
		/** @var Sheet $sheet */
		$sheet = Mapper::getObjectFrom(Sheet::class, $data);
		
		if ($elements) {
			$sheet->Elements = Cartograph::cartograph()
				->map()
				->fromArray($elements)
				->into(Sheet\Element::class); 
		}
		
		return $sheet;
	}
	
	/**
	 * @map
	 */
	public static function arrayToElement(array $data): Sheet\Element
	{
		switch ($data['Type'])
		{
			case ElementType::DOTS:
				return Cartograph::cartograph()->map()->from($data)->into(Sheet\Dots::class);
				
			case ElementType::IMAGE:
				return Cartograph::cartograph()->map()->from($data)->into(Sheet\Image::class);
				
			case ElementType::LABEL:
				return Cartograph::cartograph()->map()->from($data)->into(Sheet\Label::class);
				
			case ElementType::NUMBER:
				return Cartograph::cartograph()->map()->from($data)->into(Sheet\Number::class);
				
			case ElementType::TEXT:
				return Cartograph::cartograph()->map()->from($data)->into(Sheet\Text::class);
				
			default:
				throw new \Exception("Could not find element of type " . $data['Type']);
		}
	}
	
	/**
	 * @map
	 */
	public static function arrayToDotsElement(array $data): Sheet\Dots
	{
		return Mapper::getObjectFrom(Sheet\Dots::class, $data);
	}
	
	/**
	 * @map
	 */
	public static function arrayToImageElement(array $data): Sheet\Image
	{
		return Mapper::getObjectFrom(Sheet\Image::class, $data);
	}
	
	/**
	 * @map
	 */
	public static function arrayToLabelElement(array $data): Sheet\Label
	{
		return Mapper::getObjectFrom(Sheet\Label::class, $data);
	}
	
	/**
	 * @map
	 */
	public static function arrayToNumberElement(array $data): Sheet\Number
	{
		return Mapper::getObjectFrom(Sheet\Number::class, $data);
	}
	
	/**
	 * @map
	 */
	public static function arrayToTextElement(array $data): Sheet\Text
	{
		return Mapper::getObjectFrom(Sheet\Text::class, $data);
	}
}