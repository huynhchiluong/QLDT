<?php
$file_path=realpath(dirname(__FILE__));
include_once	 ($file_path.'/../lib/database.php');
	
include_once ($file_path.'/../helper/format.php');
include ($file_path.'/../lib/session.php');
 Session::checkLogin();
?>
<?php
class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function login_Admin($name,$pass){
           $name=mysqli_real_escape_string($this->db->link,$name); 
           $pass=mysqli_real_escape_string($this->db->link,$pass); 
           if(empty($name)||empty($pass))
           {
            $alert="Khong duoc de trong";
                return $alert;
           }
           else {
               $query="select *from tbl_admin where name='$name' and pass='$pass' limit 1";
               $result=$this->db->select($query);
               if($result)
               {
                   $value=$result->fetch_assoc();
                   Session::set('adminlogin',true);
                   Session::set('adminName',$value['$name']);
                   Session::set('adminPass',$value['$pass']);
                   header('location:manage.php');
               }
               else {
                   $alert="Sai tai khoan";
                    return $alert;
               }
           }
    }
}
?>