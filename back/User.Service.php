<?php

require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Base.Service.php';

class User extends Base{

    private $table_name = "users";
    //构造函数重写
    public function __construct() {
        parent::__construct($this->table_name);
    }
    
    //登录方法
    public function login($username,$password,$role){
        $sql = "SELECT userid,username,nickname,mark,thumbnail,state FROM users 
                WHERE username = '$username' AND password = '$password' AND role=$role";
        return $this->getQuery($sql);
    }
    
    //获取拉黑次数
    public function getBlack(){
        $sql = "SELECT u.userid,u.username,u.nickname,u.sex,u.mark,u.state,black.black FROM `users` u 
                LEFT JOIN (
                        SELECT whoid,count(*) black FROM relation WHERE state=0 GROUP BY whoid 
                ) black
                ON black.whoid = u.userid 
                ORDER BY black DESC";
        return $this->getQuery($sql);
    }
    
    //获取所有用户
    public function getUsers(){
        $sql = "SELECT nickname,username,mark,sex FROM `users` WHERE role=0";
        return $this->getQuery($sql);
    }
    
    //获取一个用户所有信息
    public function getOneUser($userid){
        $sql = "SELECT * FROM `users` WHERE userid={$userid}";
        return $this->getQuery($sql);
    }
    
    //封号方法
    public function Ban($userid){
        $sql = "UPDATE users SET state=0 WHERE userid={$userid}";
        return $this->Update($sql);
    }
    
    //解除封号方法
    public function removeBan($userid){
        $sql = "UPDATE users SET state=1 WHERE userid={$userid}";
        return $this->Update($sql);
    }

}
