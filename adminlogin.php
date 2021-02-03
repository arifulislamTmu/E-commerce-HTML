
<?php

include'session.php';
Session::checkSession();
include_once'database.php';
include_once'format.php';

?>


<?php

  class Adminlogin{

  	private $db;
  	private $fm;
  	public function __construct(){
  		
  		$this->db = new Database();
  		$this->fm = new Format();

  	}

  	public function Adminlogin(	$adminUser,$adminPass){

  			$adminUser = $this->fm->validation($adminUser);
  			$adminPass = $this->fm->validation($adminPass);

  			$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);

  			$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

  			if(empty($adminUser) || empty($adminPass)){

  					$logninmsg = "user and password must not be empty";

  					return $logninmsg;
  			}

  			else{

  				$query ="SELECT * FROM tbl_admin WHERE adminUser='$adminUser'AND adminPass='$adminPass'";

  					$result = $this->db->select($query);

  					if($result != false){

  						$value = $result->fetch_assoc();

  						Session::set("adminlogin",true);
  						Session::set("adminId",$value['adminId']);
  						Session::set("adminUser",$value['adminUser']);
  						Session::set("adminPass",$value['adminPass']);

  						header("location:dashbord.php");

  					}
  					else{

  							$logninmsg = "user and password not match";

  					          return $logninmsg;
  					}
  			}


  	}
  }


?> 