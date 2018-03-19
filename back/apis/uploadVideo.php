<?php

if($_FILES["file"]["size"]<20000000){
    if($_FILES["file"]["error"]>0){
        echo "Return Code:".$_FILES["file"]["error"]."<br/>";
    }else{
        if(file_exists("../_docupload/".$_FILES["file"]["name"])){
            echo $_FILES["file"]["name"]." Already Exists.";
        }else{
            $type = substr(strrchr($_FILES["file"]["name"], '.'), 1); 
            $file_name = time().'.'.$type;
            move_uploaded_file($_FILES["file"]["tmp_name"], "../_doc/upload/video/".$file_name);
            echo $file_name;
        }
    }
}else{
    echo "Invalid File";
}
