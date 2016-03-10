<?php
/**
 * Created by PhpStorm.
 * User: huangzyi
 * Date: 2016/3/5
 * Time: 5:54
 */include('class.php');
session_start();
$arcid = $_SESSION['arcid'];
var_dump($arcid);
$nowuser = $_SESSION['nowuser'];
if($article[$arcid]->author!==$user[$nowuser]->username)
{
    echo "<script type=\"text/javascript\">alert(\"没有权限\")</script>";
    //header("location:article.php");
}else{
    $sql = "delete  from article WHERE arcid = \"$arcid\"";
    $opconn->mysqli_query_rst($sql);
    if($opconn->result!=''){
        echo '成功';
        header("refresh:3;url = article.php");
    }else{
        echo '失败';
        header("refresh:3;url = article.php");
    }
    //header("location:../index.php");
}