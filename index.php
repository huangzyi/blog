<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
<body>
<?php
include('php/class.php');
session_start();
if($_SESSION['blogid']){
$id = $_SESSION['blogid'];
}else{
	$id = 12;
	$_SESSION['blogid'] = (int)$id;
}
//var_dump($_SESSION['nowuser']);
//var_dump($_SESSION['blogid']);
?>
	<div id="wall-paper">
		<div id="main">
			<header>
				<ul>
					<a href="../index.php"><li>主页</li></a>
					<a href="php/mainarticle.php"><li>文章</li></a>
					<a href="##"><li>个人</li></a>
					<a href="##"><li>关于</li></a>
					<input type="text" value name="search" id="search" placeholder="   Search">
				</ul>
				<a href="##"><div id="image-section">
					<img id="images" src="images/1.png">
				</div></a>
			</header>
			<section>
				<?php
$sql = "select * from article WHERE authorid = $id";
$opconn->mysqli_query_rst($sql);
$opconn->getrowsnum($sql);
//if($opconn->rowsnum >0){echo"num为$opconn->rowsnum";}
//else{echo"0";}

if($opconn->rowsnum >0){
	if($opconn->rowsnum>=4){
		$sql = "select * from article WHERE authorid = $id limit 1,3";
		$opconn->mysqli_query_rst($sql);
		//echo 'num大于3';
	}else{
		//echo 'num小于3';
	}
	while($row = mysqli_fetch_array($opconn->result)) {
		$getid = $row['arcid'];
		/*
        $article[$getid] = new article();
        $article[$getid]->arc_fetch($getid);
        var_dump($article[$getid]);*/
		echo "  <div><a href=\"php/article.php\" onclick='getarcid()'>";
		echo"<img src='images/".rand(1,6).".png'>";
		echo "<div>".$article[$getid]->title."</div></br>";
		echo "<div>".$article[$getid]->now."</div>";
		echo "       </a></div>";
		echo "<script>function getarcid(){ ".$_SESSION['arcid']=$getid;"}</script>";
	}
}else{
	echo "该用户没有日志";
}?>
			</section>
			<footer>
				<div>
					<span>© Technical Copyright</span>
					<?php
					if($_SESSION['nowuser']==''){
						echo"   <a href=\"php/register.php\"><span>注册</span></a>";
						echo"   <a href=\"php/login.php\"><span>登录</span></a>";

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
		</div>
	</div>
	<script type="text/javascript">
		var number=0;
		var arr=new Array();
		arr[0]="images/1.png";
		arr[1]="images/2.png";
		arr[2]="images/3.png";
		arr[3]="images/4.png";
		arr[4]="images/5.png";
		arr[5]="images/6.png";
		function lunbo(){
			var img=document.getElementById('images');
			if(number==arr.length-1){number=0;}
			else{number++;}
			img.src=arr[number];
		}
		setInterval(lunbo,3000);
	</script>
</body>
</html>