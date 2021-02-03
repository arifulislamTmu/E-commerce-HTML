 <?php include 'header.php';?>
 
  <?php 
		$login =  Session::get("cuslogin");
		if($login==false){
		  header("location:login.php");
		}
	?>
	<?php
	  $cmrId =  Session::get("cmrId");
	  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		$updatecmr = $cmr->customerUpdate($_POST,$cmrId);
	  }
			
	?>
		<style>
		  .tblone{width:550px;margin:0 auto;border:2px solid #dd}
		  .tblone tr td{text-align:justify}
		   .tblone input[type="text"]{width:400px;padding:5px;font-size:15px;}
		</style>  
<div class="main">
	<div class="content">
		<div class="section group">
	
	<?php
		$id =  Session::get("cmrId");
	    $getdata = $cmr->getCustomerdata($id);
		if($getdata){
			while($result = $getdata->fetch_assoc()){ ?>
		<form action="" method="POST">
		<table class="tblone">
		<?php
		  if(isset($updatecmr)){
			  echo "<td colspan='2'><h2>".$updatecmr."</h2></td>";
			  }
		?>
		<tr>
		   <td colspan="2"><h2>Update Profile Details</h2></td>
	   </tr>
		  <tr>
		    <td width="20%">Name</td>
		     <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
		    </tr>
		  <tr>
		    <td>Phone</td>
		    <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
		  </tr>
		  <tr>
		    <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
		  </tr>
		  <tr>
		    <td>Address</td>
		    <td> <input type="text" name="address" value="<?php echo $result['address'];?>"></td>
		  </tr>
		  <tr>
		    <td>City</td>
		     <td> <input type="text" name="city" value="<?php echo $result['city'];?>"></td>
		   </tr>
		   <tr>
		    <td>Zipcode</td>
		   <td> <input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
		   </tr>
		   <tr>
		    <td>Country</td>
		   <td> <input type="text" name="country" value="<?php echo $result['country'];?>"></td>
		  </tr>
		 <tr>
		    
		    <td></td>
		    <td><input type="submit" name="submit" value="UPDATE"></td>
		  </tr>
		</table>
		</form>
		<?php } } ?>
		
	</div>
</div>
	<?php include 'footer.php';?>