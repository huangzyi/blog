<?php
include('class.php');
header("Content-type:text/html;charset=utf-8");
session_start();
//echo $_SESSION['arcid'];
$arcid = $_SESSION['arcid'];
$nowuser = $_SESSION['nowuser'];
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
			<a href= "delarc.php" '>删除</a>
			<a href= "changearc.php" '>修改</a>
			</p>

			<script>function getarcid(){
			<?php $_SESSION['arcid'] = $arcid; ?>
			}</script>
			<?php
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
					echo "  <div>";
					echo "<div>" . $comment[$getid]->username . "</div></br>";
					echo "<div>" . $comment[$getid]->datetime . "</div></br>";
					echo "<div>" . $comment[$getid]->comment . "</div>";
					echo "    <div><input type=\"submit\"   value=\"留言\" name=\"submit\"/>
<a href=\" delcom.php\" onclick='getcomid()'>删除评论</a></div>";
					echo "    <div> <a href=\" changecom.php\" onclick='getcomid()'>修改评论</a></div></div>";
					echo "<script>function getcomid(){ ".$_SESSION['comid'] = $getid;"}</script>";
				}
			}else{
			}?>

			<form action=""  method="POST" >
			<input type="textarea" value="说点什么吧" name="comment"/>
			<div id="button">
				<input type="submit"   value="留言" name="submit"/>
			</div>
			</form>
			<?php
			if(!empty($_POST)){
				$comment= $_POST['comment'];
				var_dump($comment);
				$time = date("y-m-d h:i:s",time());
				//var_dump($time);
				$username = $user[$nowuser]->username;
				var_dump($username);
				var_dump($nowuser);
				$sql = "insert into comment(comment,arcid,username,userid,datetime) VALUES (\"$comment\",\"$arcid\",\"$username\",\"$nowuser\",\"$time\")";
				$opconn->mysqli_query_rst($sql);
				//header("location:article.php");
				if ($opconn->result!= ''){
					echo "插入成功";
					header("refresh:3;url =article.php");
				}else{
					echo "插入失败";
					header("refresh:3;url = article.php");
				}

			}
			?>
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
						//echo "<script>function getnowuser(){ ".$_SESSION['blogid']=$id;"}</script>";
					}

					?>
				</div>
			</footer>
		</div>
	</div>
</body>
</html>