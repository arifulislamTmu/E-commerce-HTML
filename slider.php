	
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php
			 $getiphone= $pd->letestFormiphone();
			  if($getiphone){
				  while($result = $getiphone->fetch_assoc()){
					?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productName'];?>"> 
						 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['productName'];?></h2>
						<h2>$<?php echo $result['price'];?></h2>
						
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			    <?php } }?>

			   <?php
			      $getiphone = $pd->letestFormnokia();
				    if($getiphone){
						while($result = $getiphone->fetch_assoc()){
						 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productName'];?>"> 
						 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['productName'];?></h2>
						<h2>$<?php echo $result['price'];?></h2>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
					<?php } }?>
				</div>
					
			</div>
			
			<div class="section group">
				 <?php
			      $getiphone = $pd->letestFormsamsung();
				    if($getiphone){
						while($result = $getiphone->fetch_assoc()){
						 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productName'];?>"> 
						 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['productName'];?></h2>
						<h2>$<?php echo $result['price'];?></h2>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
				   
					<?php } }?>		
					</div>
				 <?php
			      $getiphone = $pd->letestFormcanon();
				    if($getiphone){
						while($result = $getiphone->fetch_assoc()){
						 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productName'];?>"> 
						 <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['productName'];?></h2>
						<h2>$<?php echo $result['price'];?></h2>
						<div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
					<?php } }?>
					</div>
			</div>
			
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	