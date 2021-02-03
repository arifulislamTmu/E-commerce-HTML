 <?php include 'header.php';?>
<?php
 $login =  Session::get("cuslogin");
  if($login==false){
	 header("location:login.php"); 
	 }
?>


<?php
  if(isset($_GET['Confirmid'])){
	  $id = $_GET['Confirmid'];
	  $date = $_GET['time'];
	  $confrim = $ct->productConfirm($id,$date);
  }

?>
 <div class="main">
    <div class="content">
		<div class="section group">
		<div class="order">
		<h2> Your Order Details</h2>
		  
		<table class="tblone">
				<tr>
					<th>No</th>
					<th>Product Name</th>
					<th>Image</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Date</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php
				 $cmrId =  Session::get("cmrId"); 
				  $getorder = $ct->getOrderProduct($cmrId);
				  if($getorder){
					  $i=0;
					  while($result =$getorder->fetch_assoc()){
						  $i++;
			       	?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $result['ProductName']; ?></td>
					<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
					<td><?php echo $result['quantity']; ?></td>
					<td>$<?php 
					  $total = $result['price'];
					    echo $total; 
					?></td>
					<td><?php echo $fm->formatDate($result['date']); ?></td>
					<td><?php 
					if($result['status']=='0'){
						echo"panding";
						}elseif($result['status']=='1'){ ?>
						<a href="?Confirmid=<?php echo $cmrId; ?> & price =<?php echo $total ;?> & time=<?php echo $result['date'];?>">Shifted</a>
							 
					<?php }else{
							echo"Ok";	
							
						}?>
					</td>
					<?php
					 if($result['status']=='1'){ ?>
						<a href="?Confirmid=<?php echo $cmrId; ?> & price =<?php echo $total ;?> & time=<?php echo $result['date'];?>">Confirm</a>
						 
			       	<?php }elseif($result['status']=='2'){ ?>
			     	<td>Ok</td>
				
					<?php }elseif($result['status']=='0'){ ?>
						<td>N/A</td>
						
					<?php } ?>
					</tr>
				
				  <?php } }?>
		</table>
		</div>
		</div>
       <div class="clear"></div>
    </div>
 </div>
<?php include 'footer.php';?>