  <?php include 'header.php';?>
 
  <?php 
		$login =  Session::get("cuslogin");
		if($login==false){
		  header("location:login.php");
		}
	?>
	<style>
		.payment {width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd; margin: 0 auto;padding: 50px;}
		.payment h2{border-bottom:1px solid #ddd;margin-bottom:20px;padding:10px}
		 .payment p{line-height:25px;font-size:18px;text-align:left;}
		 </style>  
<div class="main">
	<div class="content">
		<div class="section group">
		<div class="payment">
		<?php
		 $cmrId =  Session::get("cmrId"); 
		 $amount = $ct->payableAmount($cmrId);
		 if($amount){
			 $sum= 0;
			 while($result = $amount->fetch_assoc()){
				$price =  $result['price'];
				 $sum = $sum+$price;
			 }
			 
		 }
		?>
		<h2>Success</h2>
		  <p style="color:red">Total Payable Amaount (Including Vat) :$
		    <?php
			 $vat = $sum * 0.1;
			 $total = $vat+$sum;
			 echo $total;
			?>
		  </p>
		  <p>Thanks for purches.Recevid your order Successfully..Here is your Order details........<a href="orderdetails.php">Visit Here</a></p>
		</div>
	
	</div>
	</div>
</div>
	<?php include 'footer.php';?>