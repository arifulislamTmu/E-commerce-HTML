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
	
	public function getCustomerdetails($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id'";
			$result = $this->db->select($query);
	        return $result;
			
		}
   }
?>