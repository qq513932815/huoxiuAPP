<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Config.php';
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/MySQL.php';
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/DbOperation.php';

class Base implements DbOperation {
    
    private $tablename;
    private $link;
    public function __construct($_table_name) {
        $this->tablename = $_table_name;
        $this->link = MySQL::getInstance(Config::GetConfig()); //获取连接对象的单例模式
    }
    
    //增
    function Insert($data) {
        return $this->link->insert($this->tablename,$data);
    }

    //删
    function Delete() {
        
    }

    //改
    function Update($sql) {
        return $this->link->update($sql);
    }

    //查
    function getAll() {
        return $this->link->getAll($this->tablename);
    }
    
    function getQuery($sql) {
        return $this->link->getQuery($sql);
    }
    
    function getOne($sql){
        return $this->link->getOne($sql);
    }
    
    function getRow($sql){
        return $this->link->getRow($sql);
    }

}
