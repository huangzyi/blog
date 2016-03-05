<?php
include('class.php');
header("Content-type:text/html;charset=utf-8");
session_start();
//echo $_SESSION['arcid'];
if($_SESSION['blogid']){
    $id = $_SESSION['blogid'];
}else{
    $id = 12;
    $_SESSION['blogid'] = $id;
    return $id;
}
//echo $id.'blog';
$getid = $_SESSION['nowuser'];
//var_dump($_SESSION['nowuser']);
//echo $getid."now";
$arcid = $_SESSION['arcid'];
if($id!=$getid)
{
    echo "<script type=\"text/javascript\">alert(\"没有权限\")</script>";
   // header("refresh:3;url = login.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="../styles/article.css">
</head>
<body>
<div id="wall-paper">
    <div id="main">
        <header>
            <ul>
                <a href="index.html">
                    <li>主页</li>
                </a>
                <a href="mainarticle.php">
                    <li>文章</li>
                </a>
                <a href="##">
                    <li>个人</li>
                </a>
                <a href="##">
                    <li>关于</li>
                </a>
                <input type="text" value name="search" id="search" placeholder="   Search">
            </ul>
        </header>
        <section>

            <form action=""  method="POST" >
                <?php  echo"  <input type=\"text\"value=". $article[$arcid]->title." name=\"title\"/>";?>
                <?php  echo "<input type=\"textarea\"value=".$article[$arcid]->article." name=\"article\"/>";?>
            <div id="button">
                <input type="submit" value="提交" name="submit"/>
            </div>
            </form>
        </section>
        <footer>
            <div>
                <span>© Technical Copyright</span>
                <?php

                $getid = $_SESSION['nowuser'];
                echo "<span>用户名：" . $user[$getid]->username . "&nbsp;</span>";
                echo "<span>id:" . $user[$getid]->id . "&nbsp;</span>";
                echo "<a href=\"index.php\" onclick='getnowuser()'><span>我的主页</span></a>";
                echo "<script>function getnowuser(){ " . $_SESSION['blogid'] = $id;
                "}</script>";
                if(!empty($_POST)){
                    $title = $_POST['title'];
                    $article = $_POST['article'];
                    $time = getdate();
                    $sql = "UPDATE article SET article = $article,now =$time,title = $title WHERE arcid = $arcid";
                    $opconn->mysqli_query_rst($sql);
                    header("location:article.php");
                }
                }
                ?>
            </div>
        </footer>
    </div>
</div>
</body>
</html>