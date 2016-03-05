<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
</head>
<body>
<div>
    <div id="form">
        <form style="text-align:center;"  action=""  method="POST">
            <h1>注册</h1>
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

<?php
include ('class.php');
header("Content-type:text/html;charset=utf-8");

if(!empty($_POST)) {
    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);
    $sql = "select * from user where username = $username";
    $exists = $opconn->mysqli_query_rst($sql);
    if ($opconn->result!='') {
        echo "<script type=\"text/javascript\">alert(\"该用户名已被注册\")</script>";
        header("location : register.php");
    } else {
        $sql= "insert into user(username,userpassport) VALUES (\"$username\",\"$pass\")";
        $opconn->mysqli_query_rst($sql);
        if ($opconn->result!=='') {
            echo "<script type=\"text/javascript\">alert(\"注册成功\")</script>";
            header("location: login.php");
        } else {
            echo '注册失败';
        }
    }
}
?>
</body>
</html>