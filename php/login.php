<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<body>
<div>
    <div id="form">
        <form style="text-align:center;"  action=""  method="POST">
            <h1>登录</h1>
            <span>用户名</span>
            <input type="text" name="username" />
            </br></br>
            <span>密码</span>&nbsp;
            <input type="password"  name="pass" />
            </br></br>

            &nbsp;<input type="submit"   value="提交" name="submit"/>
            &nbsp;&nbsp;<input type="reset" value="重置" name="reset"/>
        </form>
    </div>
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: huangzyi
 * Date: 2015/11/27
 * Time: 23:20
 */
include('class.php');
header("Content-type:text/html;charset=utf-8");
session_start();
if(!empty($_POST)) {
    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);
    $sql = "select * from user where username=$username AND userpassport=$pass";
    $opconn->mysqli_query_rst($sql);
    if ($opconn->result != '') {
        echo "<script type=\"text/javascript\">alert(\"登录成功\")</script>";
        while($row = mysqli_fetch_array($opconn->result))
        {
            $id= $row['id'];
            //var_dump($id);
            $_SESSION['nowuser'] = (int)$id;
            //var_dump($_SESSION['nowuser']);
        }
        header("location:../index.php");
    } else {
        echo "<script type=\"text/javascript\">alert(\"登录失败\")</script>";
        //header("refresh:3;url = index.php");
    }
}


?>