<?php

/*
 * 作用：数据库操作类
 * 作者：XiangtingLee 
 * 时间：2017年11月29日 09:27:55
 * 邮箱：513932815@qq.com
 */

class MySQL {

    public $host;
    public $port;
    public $name;
    public $password;
    public $charset;
    public $dbname;
    
    //声明一个静态连接变量
    private static $link;
    
    //连接成功之后在类内部 放一个连接资源
    private $result;

    //单例模式
    public static function getInstance($config){
        //单例 需要差un关键一个对象就可以  如果对象创建完毕了  那直接使用就可以直接使用
        if(!isset(self::$link)){
            self::$link = new self($config);
        }
        return self::$link;
    }

    public function __construct($config) {
        $this->host = isset($config["host"]) ? $config["host"] : "localhost";
        $this->port = isset($config["port"]) ? $config["port"] : "3306";
        $this->name = isset($config["name"]) ? $config["name"] : "root";
        $this->password = isset($config["password"]) ? $config["password"] : "root";
        $this->charset = isset($config["charset"]) ? $config["charset"] : "utf8";
        $this->dbname = isset($config["dbname"]) ? $config["dbname"] : "mysql";
        
//        print_r($config) ;

        //连接数据库
        self::$link = $this->connect();

        //设置编码
        $this->setcharset($this->charset);
        
        //选择数据库
        $this->selectdb($this->dbname);
    }

    //数据库连接
    function connect() {
        $this->result = mysqli_connect("$this->host:$this->port", $this->name, $this->password) or die("数据库连接失败");
    }

    //设置编码
    function setcharset($charset) {
        mysqli_set_charset($this->result, $charset);
    }
    
    //选择数据库
    function selectdb($dbname) {
        mysqli_select_db($this->result, $dbname);
    }
    
    //最简单的数据库查询结果集
    public function query($sql){
        if(!$ret = mysqli_query($this->result, $sql)){
            echo '执行失败。<br/>';
            echo '失败的sql语句为'.$sql.'<br/>';
            echo '出错的信息为：'.  mysqli_error($this->result).'<br/>';
            echo '出错的编号为：'.  mysqli_errno($this->result);
            die();
        }
        return $ret;
    }
    
    //获取查询SELECT * FROM 表名 
    private function GetSelectQuery($table_name, $cols=array()){
         $col_str = "*";
        if(count($cols)>0){
            $col_str = implode(",", $cols);
        }
        $sql = "SELECT $col_str FROM $table_name";
        return $sql;
    }

    //返回多条数据
    public function getAll($table_name, $cols=array()){
        $ret = $this->query($this->GetSelectQuery($table_name, $cols));
        $all = array();
        while($row = mysqli_fetch_assoc($ret)){
            $all[] = $row;
        }
        return $all;
    }
    
    //返回多条数据
    public function getQuery($sql){
        $ret = $this->query($sql);
        $all = array();
        while($row = mysqli_fetch_assoc($ret)){
            $all[] = $row;
        }
        return $all;
    }
    
    //返回单条数据
    public function getRow($sql){
        $ret = $this->query($sql);
        $row = mysqli_fetch_assoc($ret);
        if(isset($row)){
            return $row;
        }
    }
    
    //返回单行单列
    public function getOne($sql){
        $ret = $this->query($sql);
        $one = mysqli_fetch_row($ret);
        if($one == false){
            return 0;
        }
        return $one[0];
    }

    //插入
    public function insert($table_name,$data){
        $keys = [];
        $values = [];
        foreach ($data as $key => $value){
            $keys[] = $key;
            if(is_numeric($value)){
                $values[] = $value;
            }else{
                $values[] = '"'.$value.'"';
            }
            
        }
        $key_str = '('.implode(",", $keys).')';
        $value_str = '('.implode(",", $values).')';
        $sql = "INSERT INTO {$table_name} {$key_str} VALUES {$value_str}";
        $ret = $this->query($sql);
        return $ret;
    }
    
    //更改
    public function update($sql){
        $ret = $this->query($sql);
        return $ret;
    }

    //关闭数据库
    function closedb()
    {
        mysqli_close(self::$link);
    }

}
