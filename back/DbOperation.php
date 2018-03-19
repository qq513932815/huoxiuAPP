<?php

interface DbOperation
{
    
    //增
    function Insert($data);
    
    //删
    function Delete();
    
    //改
    function Update($sql);
    
    //查
    function Getall();
}
