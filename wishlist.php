 <?php include 'header.php';?>
 <?php 
	 $login =  Session::get("cuslogin");
	  if($login==false){
	 header("location:login.php"); 
	 }
?>
 
<?php
  if(isset($_GET['delprowilistId'])){
	  $productId = $_GET['delprowilistId'];
	  $delwilist =$pd->dleWishList($productId,$cmrId);
	 }
	 ?>
	 
	<div class="main">
	<div class="content">
	<div class="cartoption">		
	<div class="cartpage">
		<h2>Wish List</h2>
		  <?php 
		   if(isset($_GET['$delwilist'])){
			  echo $delwilist; 
		   }
		  ?>
			<table class="tblone">
				<tr>
					<th >S.L</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Action</th>
					
				</tr>
				<?php
				  $getpd = $pd->Chackwishlist($cmrId);
				  if($getpd){
					  $i=0;
					  while($result =$getpd->fetch_assoc()){
						  $i++;
			       	?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><a href="details.php?proid=<?php echo $result['productId'];?>">Buy Now</a> ||
					<a href="?delprowilistId=<?php echo $result['productId'];?>">Remove</a></td>
				  
				 </tr>
				
			 <?php } }?>
			</table>
		</div>
		<div class="shopping"style="width:150px;">
			<div class="shopleft">
				<a href="index.php"> <img src="images/shop.png" alt="" /></a>
			</div>
		
		</div>
</div>  	
<div class="clear"></div>
</div>
</div>
<?php include 'footer.php';?>