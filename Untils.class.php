<?php
class Untils
{
	/**
	 * 合并查询到的结果
	 * @param  [array] $wordsInfo    [字段信息二维数组]
	 * @param  [array] $tableInfoArr [数据表信息二维数组]
	 * @param  [string] $tableName   [数据表名]
	 * @return [array]    [合并之后的数据表信息数组]
	 */
	public static function mergeInfoArr($wordsInfo, $tableInfoArr){
		return array('words' => $wordsInfo, 'name' => $tableInfoArr['Name'],
			'engine' => $tableInfoArr['Engine'],
			'charset' => $tableInfoArr['Collation'],
			'comment' => $tableInfoArr['Comment'],);
	}
	/**
	 * 提取需要的字段信息，
	 * 并将获取到的字段信息数组的键值替换成需要的名字
	 * @param  [array] $wordsInfo [字段信息数组]
	 * @return [array]            [提取后的字段信息数组]
	 */
	public static function changeKey($wordsInfo){
		$result = array();
		foreach($wordsInfo as $oneWord){
			$result[] = array('name' => $oneWord['Field'], 'type' => $oneWord['Type'], 'comment' => $oneWord['Comment']);
		}
		return $result;
	}
}