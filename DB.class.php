<?php
/**
 * 数据库操作类
 * 执行数据库的增删改查操作
 */
class DB {
    private $dbHost;//数据库主机名
    private $dbName;//数据库名称
    private $dbPort;//数据库端口
    private $username;//数据库用户
    private $password;//数据库密码
    private $charset;//数据库字符集编码
    private $link;//数据库连接资源
    private $error = null;//错误信息
    /**
     * 构造函数
     * 根据传递进来的conf数组给局部变量赋初值
     * 连接数据库
     * @param array $conf
     */
    public function __construct($conf) {
        if(!isset($conf['dbHost']) || !isset($conf['dbName']) || !isset($conf['dbUser']) || !isset($conf['dbPass']) || !isset($conf['dbCharset'])){
            $this->error = '配置不完整';
        }else{
            $this->dbHost  = $conf['dbHost'];
            $this->dbName  = $conf['dbName'];
            $this->dbPort = $conf['dbPort'];
            $this->username = $conf['dbUser'];
            $this->password = $conf['dbPass'];
            $this->charset = $conf['dbCharset'];
            //连接数据库服务器
            $this->link = mysql_connect($this->dbHost . ':' .$this->dbPort,$this->username,$this->password);
            mysql_query("SET NAMES '{$this->charset}'");
            if(false === $this->link){
                $this->error = '连接数据库失败';
            }elseif(!mysql_select_db($this->dbName,$this->link)){//选择数据库
                $this->error = '连接数据库失败';
            }
        }
    }
    /**
     * [获取所有数据表的名称]
     * @return [array] [数据表名称数组]
     */
    public function getAllTableName(){
        $result = mysql_query("SHOW TABLES FROM $this->dbName");
        $tableArr = array();
        while ($row = mysql_fetch_row($result)) {
            $tableArr[] = $row[0];
        }
        return $tableArr;
    }
    /**
     * [获取创建表的sql语句]
     * @param  [string] $tableName [表名]
     * @return [string] [创建表的sql语句]
     */
    public function showCreateTable($tableName){
        $sql = " SHOW CREATE TABLE {$tableName}";
        $resource = mysql_query($sql);
        if(false === $resource){
            $this->error = mysql_error();
            return false;
        }
        return mysql_fetch_assoc($resource);
    }
    /**
     * [获取一个数据表里所有字段的所有信息]
     * @param  [type] $tableName [description]
     * @return [type]            [description]
     */
    public function showFiledsInfo($tableName){
        $sql = "SHOW FULL FIELDS FROM {$tableName};";
        $resource = mysql_query($sql);
        if(false === $resource){
            $this->error = mysql_error();
            return false;
        }
        $result = array();
        while($tmp = mysql_fetch_assoc($resource)){
            $result[] = $tmp;
        }
        return $result;
    }
    /**
     * [获取数据表的状态]
     * @return [type] [description]
     */
    public function showTableStatus(){
        $sql = "show table status from {$this->dbName}";
        $resource = mysql_query($sql);
        if(false === $resource){
            $this->error = mysql_error();
            return false;
        }
        $result = array();
        while($tmp = mysql_fetch_assoc($resource)){
            $result[$tmp['Name']] = $tmp;
        }
        return $result;
    }
    /**
     * 获取错误信息
     * 如果错误信息不存在，则返回null
     * @return string   返回值；返回当前的错误信息
     */
    public function getError(){
        return $this->error;
    }
	public function __destruct(){
		mysql_close($this->link);
	}
}
