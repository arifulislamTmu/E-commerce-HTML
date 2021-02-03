<?php
	
	include_once'database.php';
	include_once'format.php';
?>

<?php
class Customer{

	private $db;
	private $fm;
	public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	
	public function customerREgis($data){
		$name=$_POST['name'];
		$city=$_POST['city'];
		$zip=$_POST['zip'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$country=$_POST['country'];
		$phone=$_POST['phone'];
		$passoword=md5($_POST['passoword']);
		
		$mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
		$mailchack =$this->db->select($mailquery);
		if($mailchack){
			$msg ="<span class='error'>Email Already exist!!</span>";
		     return $msg;
		}else{
		
		$query = "INSERT INTO tbl_customer(name,city,zip,email,address,country,phone,passoword)
		VALUES('$name','$city','$zip','$email','$address','$country','$phone','$passoword')";
		 $insertRow = $this->db->insert($query);
		 
		 if($insertRow){
			$msg="<span class='success'>data inserted</span>";
		     return $msg;
		
		}else{
			$msg="<span class='error'>Not inserted!!</span>";
		     return $msg;
		}
		}
	}
	public function customerLogin($data){
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$passoword=md5($_POST['passoword']);
	    if(empty($email) || empty($passoword)){
		 $msg="<span class='error'>Fild must not be empty!!</span>";
		     return $msg;
	  }
		  $query = "SELECT * FROM tbl_customer WHERE email='$email' AND passoword='$passoword'";
		  $chack =$this->db->select($query);
		  if($chack !=false){
			  $value =$chack->fetch_assoc();
			  Session::set("cuslogin",true);
			   Session::set("cmrId",$value['id']);
			  Session::set("cmrname",$value['name']);
			   header("location:cart.php"); 
		  }else{
			   $msg="<span class='error'>Email OR password not match!!</span>";
		     return $msg;
		 }
	}
	public function getCustomerdata($id){
		$query = "SELECT * FROM tbl_customer WHERE id ='$id'";
		$result =$this->db->select($query);
		return $result;
		
	}
	public function customerUpdate($data,$cmrId){
		$name=$_POST['name'];
		$city=$_POST['city'];
		$zip=$_POST['zip'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$country=$_POST['country'];
		$phone=$_POST['phone'];
		
		$query = "UPDATE tbl_customer SET 
			name='$name',
			city='$city',
			zip='$zip',
			email='$email',
			address='$address',
			country='$country',
			phone='$phone'
			WHERE id='$cmrId'";
			$updated_row = $this->db->update($query );
			if($updated_row ){
				$msg  = "<span class='success'> Customer Details Update successfully</span>";
			    return $msg;
				}else{
				$msg  = "<span class='error'> Customer Details not Updated.</span>";
			return $msg;
			}
		}
		
}

?>