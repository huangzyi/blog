<?php
/**
 * Created by PhpStorm.
 * User: huangzyi
 * Date: 2016/3/5
 * Time: 5:54
 */include('class.php');
session_start();
header("Content-type:text/html;charset=utf-8");
$comid = $_SESSION['comid'];
$nowuser = $_SESSION['nowuser'];
if($comment[$comid]->username!==$user[$nowuser]->username)
{
    echo "<script type=\"text/javascript\">alert(\"没有权限\")</script>";
    header("location:article.php");
}else{
    $sql = "delete  from comment WHERE comid = $comid";
    $opconn->mysqli_query_rst($sql);
    header("location:article.php");
}