<?php
require $_SERVER["DOCUMENT_ROOT"].'/huoxiuapi/Base.Service.php';


class Video extends Base{
    
    private $table_name = "videos";
    //重写构造函数
    public function __construct() {
        parent::__construct($this->table_name);
    }
    
    public function add($videoid,$state){
        $sql = "UPDATE videos SET {$state}={$state}+1 WHERE videoid={$videoid}";
        return $this->Update($sql);
    }
    
    public function remove($videoid,$state){
        $sql = "UPDATE videos SET {$state}={$state}-1 WHERE videoid={$videoid}";
        return $this->Update($sql);
    }
    
    //获取视频
    public function Garbage($num){
        $sql = "SELECT videoid,content,likes,shares FROM `videos` WHERE garbage={$num}";
        return $this->getQuery($sql);
    }
    
    //移入回收站
    public function garbageTorF($videoid,$num){
        $sql = "UPDATE videos SET garbage={$num} WHERE videoid={$videoid}";
        return $this->Update($sql);
    }
    
    //获取用户发布的视频
    public function getUserVideos($userid){
        $sql = "SELECT videoid,videourl,headphoto,likes FROM `videos` WHERE userid = {$userid} AND garbage=0";
        return $this->getQuery($sql);
    }
    
    //获取当前视频评论
    public function getComment($videoid){
        $sql = "SELECT u.username,u.thumbnail,c.content,c.publictime FROM `comments` c
                LEFT JOIN users u ON c.userid=u.userid 
                WHERE videoid={$videoid}";
        return $this->getQuery($sql);
    }
}
