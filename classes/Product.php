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
			
			public function getFeaturedproduct(){
			 $query ="SELECT * FROM tbl_product WHERE type='0'
			 ORDER BY productId DESC LIMIT 4";
			  $result = $this->db->select($query );
			  return  $result ;
				
			}
			
			public function getNewproduct(){
				
			$query ="SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
			  $result = $this->db->select($query );
			  return  $result ;
				
			}
			public function getSignelProduct($id){
				$query = "SELECT p.*,c.catName,b.brandName
				  FROM tbl_product as p,tbl_category as c,tbl_brand as b
				  WHERE p.catId= c.catId AND p.brandId = b.brandId AND p.productId='$id'";
					$result = $this->db->select($query);
					return $result;
	             	}
					public function letestFormiphone(){
					$query ="SELECT * FROM tbl_product WHERE brandId='2' ORDER BY productId DESC LIMIT 1";
				    $result = $this->db->select($query );
				    return  $result ;	
							
				}
				public function letestFormnokia(){
					$query ="SELECT * FROM tbl_product WHERE brandId='3' ORDER BY productId DESC LIMIT 1";
				    $result = $this->db->select($query );
				    return  $result ;	
							
				}
				
				public function letestFormsamsung(){
					$query ="SELECT * FROM tbl_product WHERE brandId='5' ORDER BY productId DESC LIMIT 1";
				    $result = $this->db->select($query );
				    return  $result ;	
							
				}
				public function letestFormcanon(){
					$query ="SELECT * FROM tbl_product WHERE brandId='6' ORDER BY productId DESC LIMIT 1";
				    $result = $this->db->select($query );
				    return  $result ;	
							
				}
				public function productBycat($id){
					$query= "SELECT * FROM tbl_product WHERE catId=$id ";
					$result = $this->db->select($query);
					return $result;
					
				}
				public function insertCompareData($cmrId,$productId){
				$cmpreid = mysqli_real_escape_string($this->db->link,$cmrId);
				$cmtid = mysqli_real_escape_string($this->db->link,$productId);
				$cquery = "SELECT * FROM tbl_compare WHERE cmrId ='$cmpreid' AND productId='$cmtid'";
				 $result =$this->db->select($cquery);
				 if($result){
					 $msg  = "<span class='error'> Product Alraedy Inserted</span>";
						return $msg;
				 }
			  
				$query = "SELECT * FROM tbl_product WHERE productId ='$productId'";
			   $result =$this->db->select($query)->fetch_assoc();
			   if($result){
				   $productId = $result['productId'];
				   $productName = $result['productName'];
				   $price = $result['price'];
				   $image = $result['image'];
				   $query ="INSERT INTO tbl_compare (cmrId,productId,productName,price,image)values('$cmpreid','$cmtid','$productName','$price','$image')";
				   $insert_row = $this->db->insert($query);
				   if($insert_row){
					  $msg  = "<span class='success'> Product Add | chack Compare page!!</span>";
						return $msg;
						}else{
						$msg  = "<span class='error'> Product not Inserted</span>";
						return $msg;
						} 
						}
						}
		     public function getcompayerdata($cmrId){
				 $query = "SELECT * FROM tbl_compare WHERE cmrId ='$cmrId' ORDER BY id DESC";
				 $result = $this->db->select($query);
			    return $result;
			 }
			 public function delCompareData($cmrId){
			 $query ="DELETE FROM tbl_compare WHERE cmrId='$cmrId'"; 
			$delquery = $this->db->delete($query);
			 }
			 public function SavewishListData($id,$cmrId){
				 
				 	$cquery = "SELECT * FROM tbl_wlist WHERE cmrId ='$cmrId' AND productId='$id'";
						 $result =$this->db->select($cquery);
						 if($result){
					 $msg  = "<span class='error'> Product Alraedy Inserted...!</span>";
						return $msg;
				   }
				 
				 $pquery = "SELECT * FROM tbl_product WHERE productId='$id' ";
		       $result = $this->db->select($pquery)->fetch_assoc();
		 
			  if($result){
					$productId= $result['productId'];	
					$productName= $result['productName'];	
					$price= $result['price'];	
					$image= $result['image'];	
		
				 $query= "INSERT INTO tbl_wlist(cmrId,productId,productName,price,image) 
			  VALUES('$cmrId','$productId ','$productName ','$price ','$image')";
			 $insert_row = $this->db->insert($query );	
		     if($insert_row){
					  $msg  = "<span class='success'> Product Add | Chack Wislist Compare page!!</span>";
						return $msg;
						}else{
						$msg  = "<span class='error'> Product not Inserted</span>";
						return $msg;
					} 
		         }
			 }
			 public function Chackwishlist($cmrId){
				  $query = "SELECT * FROM tbl_wlist WHERE cmrId ='$cmrId' ORDER BY id DESC";
				 $result = $this->db->select($query);
			    return $result;
			 }
			 public function dleWishList($productId,$cmrId){
				 
				 $dquery = "DELETE FROM tbl_wlist WHERE productId='$productId' AND cmrId='$cmrId'";
					$query = $this->db->delete($dquery);
					  $msg  = "<span class='error'> Data removed...!</span>";
				return $dquery;
			 }
			 public function acerProductShow(){
				 $select = "SELECT tbl_product.*,tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_brand 
						ON tbl_product.brandId = tbl_brand.brandId
						WHERE tbl_brand.brandName='Nokia' ORDER BY productId DESC LIMIT 4";
				 $result = $this->db->select($select); 
				 return $result;
			 }
			 
			  public function samsungProductShow(){
				 $select = "SELECT tbl_product.*,tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_brand 
						ON tbl_product.brandId = tbl_brand.brandId
						WHERE tbl_brand.brandName='Samsung' ORDER BY productId DESC LIMIT 4";
				 $result = $this->db->select($select); 
				 return $result;
			 }
			 
			  public function cannonProductShow(){
				 $select = "SELECT tbl_product.*,tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_brand 
						ON tbl_product.brandId = tbl_brand.brandId
						WHERE tbl_brand.brandName='Canon' ORDER BY productId DESC LIMIT 4";
				 $result = $this->db->select($select); 
				 return $result;
			 }
			 
			}	

	?>