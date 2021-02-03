<?php include 'header.php';?>
<?php 
	 $login =  Session::get("cuslogin");
	  if($login==true){
	 header("location:order.php"); 
	 }
?>

<?php
	  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
		$customerLogins = $cmr->customerLogin($_POST);
	  }
			
	?>
 <div class="main">

    <div class="content">
	 <?php
   if(isset($customerLogins)){
	   echo $customerLogins;
   }
 ?>
    	 <div class="login_panel">
		<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="POST">
                	<input type="text" placeholder="email" name="email">
                    <input type="password" name="passoword" placeholder="password" \>
                 <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                    </div>
				</form>
               
					
		<?php
		  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
			$customerReg = $cmr->customerREgis($_POST);
		  }
				
		?>
    		
    	<div class="register_account">
		<?php
		  if(isset($customerReg)){
			  echo $customerReg;
		  }
		?>
		<h3>Register New Account</h3>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name" required />
							</div>
							
							<div>
							 <input type="text" name="city" placeholder="Your City" required />
							</div>
							
							<div>
								 <input type="text" name="zip" placeholder="Zip Code" required />
							</div>
							<div>
							  <input type="text" name="email" placeholder="Enter Email" required />
							</div>
		    			 </td>
		    			<td>
						<div>
						  <input type="text" name="address" placeholder="Address" required />
					 </div>
		    		<div>
						 <input type="text" name="country" placeholder="Country" required />
					 </div>		        
	
		           <div>
		           <input type="text" name="phone" placeholder="Phone No"required />
				</div>
				  
				  <div>
					  <input type="text" name="passoword" placeholder="Password" required />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'footer.php';?>