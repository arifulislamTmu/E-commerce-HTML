  <?php include 'header.php';?>
 
  <?php 
		$login =  Session::get("cuslogin");
		if($login==false){
		  header("location:login.php");
		}
	?>
	<style>
		.payment {width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd; margin: 0 auto;padding: 50px;}
		.payment h2{border-bottom:1px solid #ddd;margin-bottom:40px;padding:10px}
		.payment a{background:#ff0000 no-repeat 0 0; border-radius:3px; color:#fff;font-size:25px;padding:5px 30px;}
		.back a { width: 199px; margin: 6px auto 0;padding-bottom: 4px;text-align: center;display: block; background:#4C4C4C;border: 1px solid #333;line-height: 38px;font-size: 24px;color: white;border-radius: 7px;}	
      </style>  
<div class="main">
	<div class="content">
		<div class="section group">
		<div class="payment">
		<h2>Choose Payment Option</h2>
		<a href="paymentoffline.php">Offline Payment</a>
		<a href="peymentonline.php">Online Payment</a>
		</div>
		<div class="back">
		  <a href="cart.php">Previous</a>
		</div> 
	</div>
	</div>
</div>
	<?php include 'footer.php';?>