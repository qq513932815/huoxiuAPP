<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Base.Service.php';


class Relation extends Base{
    
    private $table_name = "relation";
    //重写构造函数
    public function __construct() {
        parent::__construct($this->table_name);
    }
    
    //拉黑方法
    public function Black($userid){
        $sql = "UPDATE users SET state=0 WHERE userid={$userid}";
        return $this->Update($sql);
    }
    //解除拉黑方法
    public function removeBlack($userid,$whoid){
        $sql = "UPDATE relation SET state=1 WHERE userid={$userid} AND whoid={$whoid}";
        return $this->Update($sql);
    }
    
}
