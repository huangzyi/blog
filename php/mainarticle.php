<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="../styles/index.css">
</head>
<body>
<?php
include('class.php');
session_start();
//var_dump($_SESSION['nowuser']);
//var_dump($_SESSION['blogid']);
$id = $_SESSION['blogid'];
?>
	<div id="wall-paper">
		<div id="main">
			<header>
				<ul>
					<a href="../index.php"><li>主页</li></a>
					<a href="mainarticle.php"><li>文章</li></a>
					<a href="##"><li>个人</li></a>
					<a href="##"><li>关于</li></a>
					<form action="mainarticle2.php"  method="POST">
						<input type="text" value name="search" id="search" placeholder="   Search">
						&nbsp;<input type="submit"   value="Search" name="submit"/>
					</form>
				</ul>

			</header>
			<section>
				<div id="button">
					<a href="addarc.php" style="	width: 40px;
	height: 40px;
	border: none;
	border-radius: 50%;
	transition: width height;
	cursor: pointer;
	background-color: rgba(0,0,0,0.8);
	color: #fff;">添加</a>
				</div>
				<?php
$sql = "select * from article WHERE authorid = $id";
$opconn->mysqli_query_rst($sql);
$opconn->getrowsnum($sql);
//if($opconn->rowsnum >0){echo"num为$opconn->rowsnum";}
//else{echo"0";}
if($opconn->rowsnum >0){
	while($row = mysqli_fetch_array($opconn->result)) {
		$getid = $row['arcid'];
		/*
        $article[$getid] = new article();
        $article[$getid]->arc_fetch($getid);
        var_dump($article[$getid]);*/
		echo "  <div><a href=\"article.php\" onclick='getarcid()'>";
		echo "<div>".$article[$getid]->title."</div></br>";
		echo "<div>".$article[$getid]->now."</div>";
		echo "       </a></div>";
		?>
		<script>function getarcid(){ <?php $_SESSION['arcid'] = $getid; ?>}</script>
		<?php
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
						echo"   <a href=\"register.php\"><span>注册</span></a>";
						echo"   <a href=\"login.php\"><span>登录</span></a>";

					}else{
						$getid=$_SESSION['nowuser'];
						var_dump($getid);
						echo "<span>用户名：".$user[$getid]->username."&nbsp;</span>";
						echo "<span>id:".$user[$getid]->id."&nbsp;</span>";
						echo "<a href=\"../index.php\" onclick='getnowuser()'><span>我的主页</span></a>";
						?>
						<script>function getnowuser(){ <?php $_SESSION['blogid'] = $id; ?>}</script>
					<?php }?>
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