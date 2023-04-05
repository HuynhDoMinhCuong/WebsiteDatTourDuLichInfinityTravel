<?php // IDEA:
require_once("config/db.class.php");
class User
{
   
    public $userName;
    public $email;
    public $password;
    public function __construct($u_name, $u_email, $u_pass){
        $this->userName = $u_name;
        $this->email = $u_email;
        $this->password = $u_pass;

    }
    public function save(){
        $db = new Db();
        $sql = "INSERT INTO users (UserName, Email, Password) VALUES ('".mysqli_real_escape_string($db->connect(), 
        $this->userName)."','".mysqli_real_escape_string($db->connect(),
        $this->email)."','".md5(mysqli_real_escape_string($db->connect(), $this->password))."')";
        $result = $db->query_execute($sql);
        return $result;
        
    }
    public static function checkLogin ($username, $password){
        $password = md5($password);
        $db = new Db();
        $sql = "SELECT * FROM users WHERE UserName='$username' AND Password ='$password'";
        $result = $db -> select_to_array($sql);
        return $result;
        }    

        public static function checkUsers ($username, $password){
            $password = md5($password);
            $db = new Db();
            $sql =  "SELECT UserName FROM users WHERE UserName='$username'";
            $result = $db -> select_to_array($sql);
            return $result;
            } 
        
    // Danh sách users
    public static function list_users(){
        $db = new Db();
        $sql = "SELECT * FROM users";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }
       
}

?>