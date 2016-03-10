<?php
/**
 * Created by PhpStorm.
 * User: huangzyi
 * Date: 2016/3/2
 * Time: 0:13
 */
include ('conn.php');
class user extends opmysqli{
    public $username = '';
    public $userpassport = '';
    public $id = '';
    public $blogname = '';
    public $realname = '';
    public $birthday = '';
    public $city = '';
    public $sex = '';
    public $address = '';
    public $postcode = '';
    public $email = '';
    public $tel = '';
    public $wechat = '';
    public $QQ = '';
    public $homepage = '';
    public $question = '';
    public $answer = '';
    private $user_array = array();

    function __construct()
    {
        $this->user = '';
        $this->userpassport = '';
        $this->id = '';
        $this->blogname = '';
        $this->realname = '';
        $this->birthday = '';
        $this->city = '';
        $this->sex = '';
        $this->address = '';
        $this->postcode = '';
        $this->email = '';
        $this->tel = '';
        $this->wechat = '';
        $this->QQ = '';
        $this->homepage = '';
        $this->question = '';
        $this->answer = '';
    }
    function user_fetch($id){
        $sql = "select * from USER WHERE id = $id";
        $this->mysqli_query_rst($sql);
        $this->user_array= mysqli_fetch_array($this->result);
        $this->username = $this->user_array['username'];
        $this->userpassport = $this->user_array['userpassport'];
        $this->id =  $this->user_array['id'];
        $this->blogname = $this->user_array[ 'blogname'];
        $this->realname =$this->user_array[ 'realname'];
        $this->birthday =$this->user_array[ 'birthday'];
        $this->city =$this->user_array[ 'city'];
        $this->sex =$this->user_array[ 'sex'];
        $this->address =$this->user_array[ 'address'];
        $this->postcode =$this->user_array[ 'postcode'];
        $this->email =$this->user_array[ 'email'];
        $this->tel =$this->user_array[ 'tel'];
        $this->wechat =$this->user_array[ 'wechat'];
        $this->QQ =$this->user_array[ 'QQ'];
        $this->homepage =$this->user_array[ 'homepage'];
        $this->question =$this->user_array[ 'question'];
        $this->answer =$this->user_array[ 'answer'];
    }
    /*
        function getname($id){
            $sql = "select * from USER WHERE id = $id";
            $this->mysqli_query_rst($sql);
            $row= mysqli_fetch_array($this->result);
            $this->result = $row['username'];
        }
*/
}
$sql = "select * from user";
$opconn->mysqli_query_rst($sql);
while($row = mysqli_fetch_array($opconn->result)) {
    $getid = $row['id'];
    $user[$getid] = new user();
    $user[$getid]->user_fetch($getid);
    //var_dump($user[$getid]);
}
class article extends opmysqli{
    public $arcid = '';
    public $article= '';
    public $author= '';
    public $authorid = '';
    public $now= '';
    public $title= '';
    private $arc_array = array();

    function __construct()
    {
        $this->arcid= '';
        $this->article= '';
        $this->author= '';
        $this->authorid = '';
        $this->now = '';
        $this->title= '';
    }

  public  function arc_fetch($arcid)
    {
        $sql = "select * from article WHERE arcid = $arcid";
        $this->mysqli_query_rst($sql);
        $this->arc_array = mysqli_fetch_array($this->result);
        $this->arcid = $this->arc_array['arcid'];
        $this->article = $this->arc_array['article'];
        $this->author = $this->arc_array['author'];
        $this->authorid = $this->arc_array['authorid'];
        $this->now = $this->arc_array['now'];
        $this->title = $this->arc_array['title'];
    }
}
$sql = "select * from article";
$opconn->mysqli_query_rst($sql);
while($row = mysqli_fetch_array($opconn->result)) {
    $getid = $row['arcid'];
    $article[$getid] = new article();
    $article[$getid]->arc_fetch($getid);
}
class comment extends opmysqli{
    public $arcid = '';
    public $comid = '';
    public $username = '';
    public $userid = '';
    public $comment = '';
    public $datetime = '';
    public $com_array =  array();

        function __construct()
        {
            $this->arcid = '';
            $this->comid= '';
            $this->comment= '';
            $this->username= '';
            $this->userid = '';
            $this->datetime = '';

        }
        function com_fetch($comid){
            $sql = "select * from comment WHERE comid = $comid";
            $this->mysqli_query_rst($sql);
            $this->com_array = mysqli_fetch_array($this->result);
            $this->arcid = $this->com_array['arcid'];
            $this->comid = $this->com_array['comid'];
            $this->comment = $this->com_array['comment'];
            $this->userid = $this->com_array['userid'];
            $this->username = $this->com_array['username'];
            $this->datetime = $this->com_array['datetime'];
        }
}
$sql = "select * from comment";
$opconn->mysqli_query_rst($sql);
while($row = mysqli_fetch_array($opconn->result)) {
    $getid = $row['comid'];
    $comment[$getid] = new comment();
    $comment[$getid]->com_fetch($getid);
    //var_dump($comment[$getid]);
}
?>