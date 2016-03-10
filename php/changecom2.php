<?php
include('class.php');
session_start();
//echo $_SESSION['arcid'];
header("Content-type:text/html;charset=utf-8");
$nowuser=$_SESSION['nowuser'];
//var_dump($nowuser);
$_SESSION['blogid'] = 12;
$userid = (int)$_SESSION['blogid'];
$getid = $_SESSION['nowuser'];

if(!empty($_POST)){
    $newcomment = $_POST['comment'];
    $oldcomment = $comment['$comid']->comment;
    $newtime = date("y-m-d h:i:s",time());
    $sql = "UPDATE comment SET comment = \"$newcomment\",datetime = \"$newtime\" WHERE comid = \"$comid\"";
    $opconn->mysqli_query_rst($sql);
    //header("location:article.php");
    if ($opconn->result!= ''){
        echo "插入成功";
        header("refresh:3;url = article.php");
    }else{
        echo "插入失败";
        header("refresh:3;url = changcom.php");
    }
}

?>