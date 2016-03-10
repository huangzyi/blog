<?php
include('class.php');
header("Content-type:text/html;charset=utf-8");
//session_start();
//echo $_SESSION['arcid'];
//$arcid = $_SESSION['arcid'];
//$nowuser = $_SESSION['nowuser'];
/*
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
                <a href="../index.php"><li>主页</li></a>
                <a href="mainarticle.php"><li>文章</li></a>
                <a href="##"><li>个人</li></a>
                <a href="##"><li>关于</li></a>
                <input type="text" value name="search" id="search" placeholder="   Search">
            </ul>
        </header>

        <section>


            <h1>
                <?php echo $article[$arcid]->title ?>
            </h1>
            <p>
                <?php echo $article[$arcid]->now ?>
            </p>
            <p>
                <?php echo $article[$arcid]->article ?>
            </p>
            <p>
                <a href= "delarc.php">删除</a>
                <a href= "changearc.php" >修改</a>
            </p>


            $sql = "select * from comment WHERE arcid = $arcid";
            $opconn->mysqli_query_rst($sql);
            $opconn->getrowsnum($sql);
            //if($opconn->rowsnum >0){echo"num为$opconn->rowsnum";}
            //else{echo"0";}

            if($opconn->rowsnum >0){
                while($row = mysqli_fetch_array($opconn->result)) {
                    $getid = $row['comid'];
                    /*
                    $article[$getid] = new article();
                    $article[$getid]->arc_fetch($getid);
                    var_dump($article[$getid]);*/
/*
                    echo "  <div>";
                    echo "<div>" . $comment[$getid]->username . "</div></br>";
                    echo "<div>" . $comment[$getid]->datetime . "</div></br>";
                    echo "<div>" . $comment[$getid]->comment . "</div>";
                    echo "    <div><input type=\"submit\"   value=\"留言\" name=\"submit\"/>
<a href=\" delcom.php\" onclick='getcomid()'>删除评论</a></div>";
                    echo "    <div> <a href=\" changecom.php\" onclick='getcomid()'>修改评论</a></div></div>";?>
                    <script>function getcomid(){ <?php $_SESSION['comid'] = $getid;?>}</script>
<?php
                }
            }else{
            }?>

            <form action=""  method="POST" >
                <input type="textarea"value="说点什么吧" name="comment"/>
                <div id="button">
                    <input type="submit"   value="留言" name="submit"/>
                </div>
            </form>
        </section>

        <footer>
            <div>
                <span>© Technical Copyright</span>
                <?php
                if($_SESSION['nowuser']==''){
                    echo"   <a href=\"register.php\"><span>注册</span></a>";
                    echo"   <a href=\"login.php\"><span>登录</span></a>";

                }else{
                    $getid=$_SESSION['nowuser'];
                    echo "<span>用户名：".$user[$getid]->username."&nbsp;</span>";
                    echo "<span>id:".$user[$getid]->id."&nbsp;</span>";
                    echo "<a href=\"index.php\" onclick='getnowuser()'><span>我的主页</span></a>";
                    echo "<script>function getnowuser(){ ".$_SESSION['blogid']=$id;"}</script>";
                }

                ?>
            </div>
        </footer>
    </div>*/
/*
</div>
</body>
</html>
$sql = "select * FROM article";
//$result = mysqli_query($opconn->conn,"SELECT * FROM article");
$opconn->mysqli_query_rst($sql);
$opconn->getrowsnum($sql);
//if($opconn->rowsnum >0){echo"num为$opconn->rowsnum";}
//else{echo"0";}

/*
if($opconn->rowsnum >0) {
    if ($opconn->rowsnum >= 4) {
        //$sql = "select * from article WHERE authorid = $id limited (1,3)";
        $opconn->mysqli_query_rst($sql);
        //echo 'num大于3';
    } else {
        //echo 'num小于3';
    }*/
/*
$sql = "select * from article";
$opconn->mysqli_query_rst($sql);
while($row = mysqli_fetch_array($opconn->result)) {
        var_dump($row);
        $getid = $row['arcid'];

        /*$article[$getid] = new article();
        $article[$getid]->arc_fetch($getid);
        var_dump($article[$getid]);*/
     /*   echo "  <a href=\"php/article.php\" onclick='getarcid()'>";
        echo "<img src='../images/" . rand(1, 6) . ".png'>";
        echo  $article[$getid]->title . "</br>";
        echo "" . $article[$getid]->now . "";
        echo "       </a>";?>
         <script>function getarcid(){ <?php $_SESSION['arcid'] = $getid; ?>}</script>
<?php
}
//}*/?>
<form action=""  method="POST" >
                <input type="text"value=" 题目" name="title"/>
                <input type="textarea\"value="" name="article"/>

                <div id="button">
                    <input type="submit" value="提交" name="submit"/>
                </div>
            </form>
<?php
if(!empty($_POST)){
    $title = $_POST['title'];
    var_dump($title);
    $article = $_POST['article'];
    var_dump($article);
$sql = "insert into article(article,title) VALUES (\"$article\",\"$title\")";
$opconn->mysqli_query_rst($sql);
//header("location:article.php");
if ($opconn->result!= ''){
    echo "插入成功";
    //header("refresh:3;url = addarc.php");
}else{
    echo "插入失败";
    //header("refresh:3;url = addarc.php");
}}
?>