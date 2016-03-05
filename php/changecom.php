<?php
include('class.php');
session_start();
header("Content-type:text/html;charset=utf-8");
//echo $_SESSION['arcid'];
$arcid = $_SESSION['arcid'];
$nowuser = $_SESSION['nowuser'];
$comid = $_SESSION['comid'];
if($comment[$comid]->username!==$user[$nowuser]->username)
{
    echo "<script type=\"text/javascript\">alert(\"没有权限\")</script>";
    header("location:article.php");
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
            <a href="../index.php" onclick='delarcid()'>删除</a>";
            <h1>
                <?php echo $article[$arcid]->title ?>
            </h1>

            <p>
                <?php echo $article[$arcid]->now ?>
            </p>

            <p>
                <?php echo $article[$arcid]->article ?>
            </p>
            <?php
            $sql = "select * from comment WHERE arcid = $arcid EXCEPT comid = $comid";
            $opconn->mysqli_query_rst($sql);
            $opconn->getrowsnum($sql);
            //if($opconn->rowsnum >0){echo"num为$opconn->rowsnum";}
            //else{echo"0";}

            if ($opconn->rowsnum > 0) {
                while ($row = mysqli_fetch_array($opconn->result)) {
                    $getid = $row['comid'];
                    /*
                    $article[$getid] = new article();
                    $article[$getid]->arc_fetch($getid);
                    var_dump($article[$getid]);*/
                    echo "  <div>";
                    echo "<div>" . $comment[$getid]->username . "</div></br>";
                    echo "<div>" . $comment[$getid]->now . "</div></br>";
                    echo "<div>" . $comment[$getid]->comment . "</div>";
                    echo "     <a href=\" delcom.php\" onclick='getcomid()'>删除评论</a></div>";
                    echo "     <a href=\" changecom.php\" onclick='getcomid()'>修改评论</a></div>";
                    echo "<script>function getcomid(){ " . $_SESSION['comid'] = $getid;
                    "}</script>";
                }
            } else {
            }
            echo "<form action=\"\"  method=\"POST\" >";
            echo "   <input type=\"textarea\"value=" . $comment[$comid]->comment . " name=\"comment\"/>";
            ?>
            <div id="button">
                <input type="submit" value="修改" name="submit"/>
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
                echo "<a href=\"../index.php\" onclick='getnowuser()'><span>我的主页</span></a>";
                echo "<script>function getnowuser(){ " . $_SESSION['blogid'] = $id;
                "}</script>";
                if(!empty($_POST)){
                    $newcomment = $_POST['comment'];
                    $oldcomment = $comment['$comid']->comment;
                    $newtime = getdate();
                    $sql = "UPDATE comment SET comment = $newcomment,datetime = $newtime WHERE comid = $comid";
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