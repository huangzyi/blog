<?php
class opmysqli{
	private $host = '127.0.0.1';
	private $dbname = 'root';
	private $dbpwd = '';
	private $dbase = 'database';//数据库名
	public $dbh = '';
	public $conn = '';
	public $result =''; //结果集
	private $fieldsnum = 0; //返回字段数
	public $rowsnum = 0;//返回结果数
	//初始化类

	function __construct($host = '', $dbname = '', $dbpwd = '', $dbase = '')
	{
		if ($host != '')
			$this->host = $host;
		if ($dbname != '')
			$this->dbname = $dbname;
		if ($dbpwd != '')
			$this->dbpwd = $dbpwd;
		if ($dbase != '')
			$this->dbase = $dbase;
		$this->init_conn();
	}
/*
	//连接数据库
	function init_conn(){
		try{
			$this->dbh = new PDO("mysql:host=$this->host;dbname=$this->dbase","$this->dbname","$this->dbpwd");
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
			$this->dbh->exec('set names utf8');
		}catch(PDOException $e){
			echo '数据库连接失败：'.$e->getMessage();
			exit;
		}
	}
	/*
	//查询结果
	function pdo_exec($sql){
		//insert,update,delete
		if($this->dbh ==''){
			$this->init_conn();
		}
		$this->result = $this->dbh->exec($sql);
	}
*/
	function init_conn(){
		$this->result ='';
		$this->conn= mysqli_connect($this->host,$this->dbname,$this->dbpwd);
		mysqli_select_db($this->conn,$this->dbase);
		mysqli_query($this->conn,"set names utf8");
	}

	function mysqli_query_rst($sql){
		$this->result ='';
		if($this->conn == ''){
			$this->init_conn();
		}
		$this->result = mysqli_query($this->conn,$sql);
	}
	//取得查询结果数
	function getrowsnum($sql){
		$this->result = '';
		$this->mysqli_query_rst($sql);
		if($this->result!=='') {
			$this->rowsnum = mysqli_num_rows($this->result);
		}
	}
/*
	//取得字段数
	function getfieldsnum($sql){
		$this->result = '';
		$this->mysqli_query_rst($sql);
		if($this->result!=''){
		$this->fieldsnum = mysqli_num_fields($this->result);
		}
	}


	//更新、删除、添加记录数
	function uidrst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
		$this->conn->exec($sql);
		$this->rowsnum = $this->conn->affected_rows;
		return $this->rowsnum;
	}
*/


}
$opconn= new opmysqli();
?>
