<?php include 'header.php';?>

<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		     <?php
			   $acercat = $pd->acerProductShow();
			   if(isset($acercat)){
				   while($result =$acercat->fetch_assoc()){ ?>
					   
					   <div class="grid_1_of_4 images_1_of_4">
					 <img src="admin/<?php echo $result['image'] ?>"/>
					 <h2><?php echo $result['productName'] ?></h2>
					<p>$<?php echo $result['price'] ?></p>
					  <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				  </div>
			   <?php } }?>
				</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			 <?php
			   $Samsungcat = $pd->samsungProductShow();
			   if(isset($Samsungcat)){
				   while($result =$Samsungcat->fetch_assoc()){ ?>
					   
					   <div class="grid_1_of_4 images_1_of_4">
					 <img src="admin/<?php echo $result['image'] ?>"/>
					 <h2><?php echo $result['productName'] ?></h2>
					<p>$<?php echo $result['price'] ?></p>
					  <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				  </div>
			   <?php } }?>
		
			</div>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			 <?php
			   $Canoncat = $pd->cannonProductShow();
			   if(isset($Canoncat)){
				   while($result =$Canoncat->fetch_assoc()){ ?>
					   
					   <div class="grid_1_of_4 images_1_of_4">
					 <img src="admin/<?php echo $result['image'] ?>"/>
					 <h2><?php echo $result['productName'] ?></h2>
					<p>$<?php echo $result['price'] ?></p>
					  <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				  </div>
			   <?php } }?>
			
			
              
				</div>
			</div>
    </div>
 </div>
</div>
<?php include 'footer.php';?>

    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

