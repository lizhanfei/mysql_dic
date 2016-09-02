<?php
//接收提交的参数
$conf['dbHost'] = $_POST['host'];
$conf['dbPort'] = $_POST['port'];
$conf['dbName'] = $_POST['dbname'];
$conf['dbUser'] = $_POST['username'];
$conf['dbPass'] = $_POST['password'];
$conf['dbCharset'] = 'utf8';

//加载工具类和数据库类
require './Untils.class.php';
require './DB.class.php';

//实例化数据库类
$db = new DB($conf);

//获取所有数据表的信息
$tableInfos 	= array();
$tableInfoArr   = $db->showTableStatus();

//循环遍历数据表数组信息，获取每一个数据表的详细字段信息
foreach($tableInfoArr as $tableName=>$oneTable){
	$wordsInfo = Untils::changeKey($db->showFiledsInfo($tableName));
	$tableInfo = Untils::mergeInfoArr($wordsInfo, $oneTable);
	$tableInfos[] = array('name' => $tableName, 'infos' => $tableInfo);
}

require './show.html';