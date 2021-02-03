
<?php
	
	include_once'database.php';
	include_once'format.php';
?>

<?php
class Cart{

	private $db;
	private $fm;
	public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function getOrderpro(){
			$query = "SELECT * FROM tbl_order ORDER BY date DESC";
			$result = $this->db->select($query);
	        return $result;
			
		}
		
		public function productShifted($id,$date){
			
			$id = mysqli_real_escape_string($this->db->link,$id);
			$date = mysqli_real_escape_string($this->db->link,$date);
			
			$query = "UPDATE tbl_order SET status ='1' WHERE cmrId ='$id' AND date='$date'";
		  $update_row = $this->db->update($query);
		 if($update_row){
			$msg ="<span class='success'>Update successfully</span>";
			 return $msg;
		 }else{
			 $msg ="<span class='error'>NOT Update</span>";
			 return $msg;
			 
		 }
		
		}
		public function productdelet($id,$date){
			$id = mysqli_real_escape_string($this->db->link,$id);
			$date = mysqli_real_escape_string($this->db->link,$date);
			$query = "DELETE FROM tbl_order WHERE cmrId ='$id' AND date='$date'";
			 $delquery = $this->db->delete($query);
			if($delquery){
				$msg ="<span class='success'>Data deleted successfully</span>";
			 return $msg;
				
			}else{
				$msg ="<span class='error'>NOT Deleted</span>";
			 return $msg;
			 
			}
		}
		
   }
?>