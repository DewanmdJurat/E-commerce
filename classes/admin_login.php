<?php
class AdminLogin{
	private $db_connect;

	public function __construct(){
		$host='localhost';
		$dbuser='root';
		$dbpass='';
		$dbname='dbmobileshop';
		$this->db_connect=mysqli_connect($host,$dbuser,$dbpass,$dbname);
		if(!$this->db_connect){
			die("DataBase Not Connected".mysqli_error($this->db_connect));
		}
	}
	public function admin_login_check($data){
		$email_address=$data['email_address'];
		$password=md5($data['password']);
		$sql="SELECT * FROM tbl_admin_user WHERE email_address='$email_address' AND password='$password'";
		if(mysqli_query($this->db_connect,$sql)){
			$result=mysqli_query($this->db_connect,$sql);
			$admin=mysqli_fetch_assoc($result);
			if($admin){
				session_start();
				$_SESSION['username']=$admin['username'];
				$_SESSION['admin_id']=$admin['admin_id'];
				header("Location:admin_master.php");
			}else{
				$message= "your Email Address or Password invalide";
				return $message;
			}
		}else{
			die("Query Problem".mysqli_error($this->db_connect));
		}
	}
	public function logout(){
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_name']);
		header('Location:index.php');
	}

}