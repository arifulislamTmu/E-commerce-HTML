   <?php include 'header.php';?>

  <?php 
		$login =  Session::get("cuslogin");
		if($login==false){
		  header("location:login.php");
		}
	?>
	
	<?php
	  if(isset($_GET['orderid']) && $_GET['orderid']==order){
		 $cmrId =  Session::get("cmrId"); 
		 $insertOrder = $ct->insertOrder($cmrId);
		   $deldta= $ct->delcustomerCurt();
		   header("location:success.php");
	  }
	?>
	<style>
	      .divition{width:50%;float:left;}
	      .tblone{width:550px;margin:0 auto;border:2px solid #dd}
		  .tblone tr td{text-align:justify}
		  .tbltwo{float:right;text-align:left;width:70%;border:2px solid #ddd;margin-top:12px;margin-right:14px;}
		   .tbltwo tr td{text-align:justify;padding: 5px 10px; }
		   .ordernow {padding-bottom:30px;}
		   .ordernow a{width:200px;margin:20px auto 0;text-align:center;padding:5px;font-size:30px;display:block;background:#ff0000;color:#fff;border-radius:3px;}
	</style>  
<div class="main">
	<div class="content">
		<div class="section group">
		<div class="divition">
					<table class="tblone">
				<tr>
					<th>No</th>
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					
				</tr>
				<?php
				  $getpro = $ct->getCartProduct();
				  if($getpro){
					  $i=0;
					  $sum=0;
					  $qty=0;
					  while($result =$getpro->fetch_assoc()){
						  $i++;
			       	?>
				
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><?php echo $result['quantity']; ?></td>
					<td>$<?php 
					  $total = $result['price'] * $result['quantity'];
					    echo $total; 
					?></td>
					</tr>
				<?php
				  $qty = $qty + $result['quantity'];
				  $sum = $sum +$total;
				 
				?>
				  <?php } }?>
			</table>
			<table class="tbltwo">
				<tr>
					<td>Sub Total</td>
					 <td>:</td>
					<td>$<?php echo $sum?></td>
				</tr>
				<tr>
					<td>VAT </td>
					 <td>:</td>
					<td>10%(<?php echo $vat = $sum*0.1; ?>)</td>
				</tr>
				<tr>
					<td>Grand Total</td>
					 <td>:</td>
					<td><?php 
					 $vat = $sum*0.1;
					 $grandTotal = $sum + $vat;
					 echo"$ ".$grandTotal;
					?> </td>
				</tr>
		   </table>
		
		</div>
		<div class="divition">
		<?php
		$id =  Session::get("cmrId");
	    $getdata = $cmr->getCustomerdata($id);
		if($getdata){
			while($result = $getdata->fetch_assoc()){ ?>
		
		<table class="tblone">
		<tr>
		   <td colspan="3"><h2>Your Profile Details</h2></td>
	   </tr>
		  <tr>
		    <td width="20%">Name</td>
		    <td width="5%">:</td>
		    <td><?php echo $result['name'];?></td>
		  </tr>
		  <tr>
		    <td>Phone</td>
		    <td>:</td>
		    <td><?php echo $result['phone'];?></td>
		  </tr>
		  <tr>
		    <td>Email</td>
		    <td>:</td>
		    <td><?php echo $result['email'];?></td>
		  </tr>
		  <tr>
		    <td>Address</td>
		    <td>:</td>
		    <td><?php echo $result['address'];?></td>
		  </tr>
		  <tr>
		    <td>City</td>
		    <td>:</td>
		    <td><?php echo $result['city'];?></td>
		  </tr>
		   <tr>
		    <td>Zipcode</td>
		    <td>:</td>
		    <td><?php echo $result['zip'];?></td>
		  </tr>
		   <tr>
		    <td>Country</td>
		    <td>:</td>
		    <td><?php echo $result['country'];?></td>
		  </tr>
		 <tr>
		    <td></td>
		    <td></td>
		    <td><button><a href="editprofile.php">Update Details</td></button></a>
		  </tr>
		</table>
		
		<?php } } ?>
		
		
		</div>
		
	</div>
	<div class="ordernow"><a href="?orderid=order">Order</a></div>
	</div>
</div>
	<?php include 'footer.php';?>