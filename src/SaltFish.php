<?php
namespace jiosen\sijiu;

class SaltFish 
{
	/**
	 * 兼容 array_column
	 */
	public static function array_column($input, $columnKey, $indexKey=null)
	{
		if (!function_exists('array_column')) {
			$result = array();
			foreach ($input as $subArray) {
				if (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
					$result[] = is_object($subArray)?$subArray->$columnKey: $subArray[$columnKey];
				} elseif (array_key_exists($indexKey, $subArray)) {
					if (is_null($columnKey)) {
						$index = is_object($subArray)?$subArray->$indexKey: $subArray[$indexKey];
						$result[$index] = $subArray;
					} elseif (array_key_exists($columnKey, $subArray)) {
						$index = is_object($subArray)?$subArray->$indexKey: $subArray[$indexKey];
						$result[$index] = is_object($subArray)?$subArray->$columnKey: $subArray[$columnKey];
					}
				}
			}
			return $result;
		}else{
			return array_column($input, $columnKey, $indexKey);
		}
	}
}