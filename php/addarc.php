<?php
include('class.php');
session_start();
//echo $_SESSION['arcid'];
header("Content-type:text/html;charset=utf-8");
$nowuser=$_SESSION['nowuser'];
//var_dump($nowuser);
$userid = (int)$_SESSION['blogid'];
//var_dump("$nowuser");
/*
if($username!=$nowuser)
{
    echo "<script type=\"text/javascript\">alert(\"没有权限\")</script>";
    header("location:login.php");
}else{*/
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
<? /*
            <ul>
                <a href="../index.php">
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
            </ul>*/?>
            <form action="addarc2.php"  method="POST" >
                <input type="text"value=" 题目" name="title"/>
                <input type="textarea\"value="" name="article"/>";

                <div id="button">
                    <input type="submit" value="提交" name="submit"/>
                </div>
            </form>
        </header>
        <section>
        </section>
        <footer>
            <div>
                <span>© Technical Copyright</span>
                <?php
                $getid = $_SESSION['nowuser'];
                echo "<span>用户名：" . $user[$getid]->username . "&nbsp;</span>";
                echo "<span>id:" . $user[$getid]->id . "&nbsp;</span>";
                echo "<a href=\"index.php\" onclick='getnowuser()'><span>我的主页</span></a>";?>
                <script>function getnowuser(){ <?php $_SESSION['blogid'] = $id;?>}</script>
                <?php /*
                if(!empty($_POST)){
                    $title = $_POST['title'];
                    //var_dump($title);
                    $article = $_POST['article'];
                    //var_dump($article);
                    $time = date("y-m-d h:i:s",time());
                    //var_dump($time);
                    $username = $user[$nowuser]->username;
                    //var_dump($username);
                    $sql = "insert into article(article,author,arthorid,now,title) VALUES (\"$article\",\"$username\",\"$nowuser\",\"$time\",\"$title\")";
                    $opconn->mysqli_query_rst($sql);
                    //header("location:article.php");
                    if ($opconn->result!= ''){
                        echo "插入成功";
                    }else{
                        echo "插入失败";
                    }
                } */
                ?>
            </div>
        </footer>
    </div>
</div>
</body>
</html>