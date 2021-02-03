<?php

include_once'database.php';
include_once'format.php';

?>
<?php
class Product{

	private $db;
	private $fm;
	public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function productInsert($data,$file){
		
		$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId      = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId    = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body       = mysqli_real_escape_string($this->db->link,$data['body']);
		$price      = mysqli_real_escape_string($this->db->link,$data['price']);
		$type       = mysqli_real_escape_string($this->db->link,$data['type']);
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
		if($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" ||  $type==""){
			
			$msg = "<span class='error'> Fields must not be empty</span>";
			 return $msg;
		}else{
			  move_uploaded_file($file_temp, $uploaded_image);
			  
			  $query= "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) VALUES('$productName','$catId ','$brandId ','$body ','$price ','$uploaded_image','$type ')";
			
		$insert_row = $this->db->insert($query );
			if($insert_row){
			$msg  = "<span class='success'> Product Insert successfully</span>";
			return $msg;
		}
		else{
			
			$msg  = "<span class='error'> Product not Inserted .</span>";
			return $msg;
		}
		 }
			
		}
		public function getAllProduct(){
			
			$query = "SELECT p.*,c.catName,b.brandName
			  FROM tbl_product as p,tbl_category as c,tbl_brand as b
			  WHERE p.catId= c.catId AND p.brandId = b.brandId
			  ORDER BY p.productId DESC";
		
			
	/*
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_category 
						ON tbl_product.catId = tbl_category.catId
						INNER JOIN tbl_brand 
						ON tbl_product.brandId = tbl_brand.brandId
						ORDER BY tbl_product.productId DESC";
					
					*/
						$result = $this->db->select($query);
						return $result;
		}
		
		public function getProById($id){
			 $query ="SELECT * FROM tbl_product WHERE productId='$id'";
			  $result = $this->db->select($query );
			  return  $result ;
			
			
		}
		public function productupdate($data,$file,$id){
					$productName= mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId      = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId    = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body       = mysqli_real_escape_string($this->db->link,$data['body']);
		$price      = mysqli_real_escape_string($this->db->link,$data['price']);
		$type       = mysqli_real_escape_string($this->db->link,$data['type']);
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
		if($productName=="" || $catId=="" || $brandId=="" || $body=="" || $price=="" ||  $type==""){
			
			$msg = "<span class='error'> Fields must not be empty</span>";
			 return $msg;
		}else{
			  move_uploaded_file($file_temp, $uploaded_image);
			  
			 $query ="UPDATE tbl_product SET productName='$productName',catId='$catId',brandId='$brandId',body='$body', price='$price',image='$uploaded_image',type='$type'
			   WHERE productId='$id'";
			 
			  
		$updated_row = $this->db->update($query );
			if($updated_row){
			$msg  = "<span class='success'> Product update successfully</span>";
			return $msg;
		}
		else{
			
			$msg  = "<span class='error'> Product not updeted .</span>";
			return $msg;
		}
		 }
			
			
		}
		public function delproductbyId($id){
			$query = "SELECT * FROM tbl_product WHERE productId='$id'";
			
			$getdata = $this->db->select($query);
			if($getdata){
				while($delImg = $getdata->fetch_assoc()){
				$dellink = $delImg['image'];
				unlink($dellink );
				}	
				}
				$delquery=" DELETE FROM tbl_product WHERE productId='$id'";
			     $delData = $this->db->delete($delquery);

			   if($delData){
					$msg  = "<span class='success'> Product Deleted successfully</span>";
					return $msg;
				}else{
					$msg  = "<span class='error'> Product not Deleted.</span>";
					return $msg;
				}

			}

		}	

	?>