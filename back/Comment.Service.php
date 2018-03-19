<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Base.Service.php';


class Comment extends Base{
    
    private $table_name = "comments";
    //重写构造函数
    public function __construct() {
        parent::__construct($this->table_name);
    }
    
    
}
