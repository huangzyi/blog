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
echo "<span>用户名：" . $user[$getid]->username . "&nbsp;</span>";
echo "<span>id:" . $user[$getid]->id . "&nbsp;</span>";
echo "<a href=\"../index.php\" onclick='getnowuser()'><span>我的主页</span></a>";?>
<script>function getnowuser(){ <?php $_SESSION['blogid'] = $id;?>}</script>
<?php
if(!empty($_POST)){
    $title = $_POST['title'];
   // var_dump($title);
    $article = $_POST['article'];
    //var_dump($article);
    $time = date("y-m-d h:i:s",time());
    //var_dump($time);
    $username = $user[$nowuser]->username;
    var_dump($username);
    $sql = "insert into article(article,title,author,authorid,now) VALUES (\"$article\",\"$title\",\"$username\",\"$userid\",\"$time\")";
    $opconn->mysqli_query_rst($sql);
    //header("location:article.php");
    if ($opconn->result!= ''){
        echo "插入成功";
        header("refresh:3;url = mainarticle.php");
    }else{
        echo "插入失败";
        header("refresh:3;url = addarc.php");
    }

}
?>