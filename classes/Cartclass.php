
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
	
	public function addToCart($quantity,$id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$productId = mysqli_real_escape_string($this->db->link,$id);
		$sId       = session_id();
		
		$squery = "SELECT * FROM tbl_product WHERE productId='$productId'";
		
		$result = $this->db->select($squery)->fetch_assoc();
		
		$productName = $result['productName'];
		$price = $result['price'];
		$image = $result['image'];
		
			  $chkquery = "SELECT * FROM tbl_cart WHERE productId='$productId' AND sId='$sId' ";
			  $chakpro =$this->db->select($chkquery);
			  if($chakpro){
				  $msg = "Product Alraedy Added";
				  return $msg;
			  }else{
			  
			  $query= "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) 
			  VALUES('$sId','$productId ','$productName ','$price ','$quantity ','$image')";
			
	    	$insert_row = $this->db->insert($query );
			if($insert_row){
				header("location:cart.php");
		}
		else{
			header("location:404.php");
			
		}
		}
	}
	public function getCartProduct(){
		$sId  = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId='$sId' ";
		$result =$this->db->select($query);
		return $result;
		
	}
	public function updateCartQuantity($cartId,$quantity){
		$cartId = mysqli_real_escape_string($this->db->link,$cartId);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		
		$query = "UPDATE tbl_cart SET quantity='$quantity' WHERE cartId='$cartId'";
			
			$updated_row = $this->db->update($query );
			
			if($updated_row ){
				header("location:cart.php");
			   }else{
				$msg  = "<span class='error'style='font-size:18px;color:red;'> Quantity  not Updated.</span>";
			    return $msg;
			}
	}
	public function deleteCartproduct($delid){
		
		$delquery = "DELETE FROM tbl_cart WHERE cartId='$delid'";
		$deleted_row = $this->db->delete($delquery );
		if($deleted_row ){
				$msg  = "<span class='success' style='font-size:18px;color:green;'> Delete successfully</span>";
			    return $msg;
			   }else{
				$msg  = "<span class='error'style='font-size:18px;color:red;'> Quantity  not Delete.</span>";
			    return $msg;
			}
	}
	 
   public function checkCartTable(){
	   $sId  = session_id();
	$query = "SELECT * FROM tbl_cart WHERE sId='$sId' ";
	 
	  $result = $this->db->select($query);
	  return $result;
  }
  public function delcustomerCurt(){
	  $sId = session_id();
	  $query = "DELETE FROM tbl_cart WHERE sId='$sId'";
	  $this->db->delete($query);
	  }
	  public function insertOrder($cmrId){
		  
		  $sId  = session_id();
	      $query = "SELECT * FROM tbl_cart WHERE sId='$sId' ";
		  $getPro = $this->db->select($query);
		 
			  if($getPro){
				while($result = $getPro->fetch_assoc()){
					$productId= $result['productId'];	
					$productName= $result['productName'];	
					$quantity = $result['quantity'];	
					$price= $result['price']* $quantity;	
					$image= $result['image'];	
					 
			  $query= "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) 
			  VALUES('$cmrId','$productId ','$productName ','$quantity ','$price ','$image')";
			 $insert_row = $this->db->insert($query );	
		}  
		}
	} 
	public function payableAmount($cmrId){
	  $query = "SELECT price FROM tbl_order WHERE cmrId='$cmrId' AND date = now()";
	  $getPro = $this->db->select($query);	
	  return $getPro;
		
	}
	public function getOrderProduct($cmrId){
		
		$query = "SELECT * FROM tbl_order WHERE cmrId='$cmrId' ORDER BY productId DESC";
		  $getPro = $this->db->select($query);	
		 return $getPro;
	}
	public function checkordetaPro($cmrId){
	        $query = "SELECT * FROM tbl_order WHERE cmrId='$cmrId'";
			$result = $this->db->select($query);
	        return $result;
		}
		public function productConfirm($id,$date){
		    $id = mysqli_real_escape_string($this->db->link,$id);
			$date = mysqli_real_escape_string($this->db->link,$date);
			
			$query = "UPDATE tbl_order SET status ='2' WHERE cmrId ='$id' AND date='$date'";
		    $update_row = $this->db->update($query);
		    if($update_row){
			$msg ="<span class='success'>Update successfully</span>";
			 return $msg;
		    }else{
			 $msg ="<span class='error'>NOT Update</span>";
			 return $msg;
			 
		 }
		
		}
		public function serchproData($search_product){
			$query ="SELECT * FROM tbl_product WHERE productName LIKE '%$search_product%' ";
		    $select = $this->db->select($query);
			return $select;
		}
			
		
   }
?>