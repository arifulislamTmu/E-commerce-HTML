<?php include 'header.php';?>
<?php 
	 $login =  Session::get("cuslogin");
	  if($login==false){
	 header("location:login.php"); 
	 }
?>

<?php
  if(isset($_GET[''])){
	 }
	 ?>
	<div class="main">
	<div class="content">
	<div class="cartoption">		
	<div class="cartpage">
	 <style>
	  .tblone td img{width:100px; height:90px;}
	 </style>
		<h2>Compare</h2>
			<table class="tblone">
				<tr>
					<th >S.L</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Action</th>
					
				</tr>
				<?php
				  $cmrId = Session::get("cmrId");
				  $getpd = $pd->getcompayerdata($cmrId);
				  if($getpd){
					  $i=0;
					  while($result =$getpd->fetch_assoc()){
						  $i++;
			       	?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $result['ProductName']; ?></td>
					<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><a href="details.php?proid=<?php echo $result['productId'];?>">View</a></td>
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