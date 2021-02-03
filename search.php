 <?php include 'header.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Search results</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		    	<?php
			 if(isset($_POST['subbutn'])){
				$search_product = $_POST['search_product']; 
				$serchpro = $ct->serchproData($search_product);
			    }
			   if(isset($serchpro)){
					while($result = $serchpro->fetch_assoc()){ ?>
		  
				<div class="grid_1_of_4 images_1_of_4">
				     <img src="admin/<?php echo $result['image'];?> "/>
					 <h2><?php echo $result['productName'] ?></h2>
					  <p>$<?php echo $result['price'] ?></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			   <?php } }?>
			</div>
    </div>
 </div>
<?php include 'footer.php';?>