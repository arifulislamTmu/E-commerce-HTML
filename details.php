<?php include 'header.php';?>

<?php

 if(isset($_GET['proid'])){
    $id = $_GET['proid'];
   }
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
		$addCart =  $ct->addToCart($quantity,$id);
	}
  ?>
<?php
	  $cmrId =  Session::get("cmrId");
	  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['compare'])){
		$productId = $_POST['productId'];
		$insertcompere = $pd->insertCompareData($cmrId,$productId);
	  }
	?>
	
	<?php
	  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wlist'])){
		$savewlist = $pd->SavewishListData($id,$cmrId);
	  }
	?>
	
	<style>
	 .mybutton{width:100px; float:left;margin-right:50px;}
	</style>
	
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				<?php
				 $getpd = $pd->getSignelProduct($id);
				 if($getpd){
					 while($result = $getpd->fetch_assoc()){
					?>
					
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
					
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<span style="color:red;font-size:18px;">
				  <?php
				    if(isset($addCart)){
					echo $addCart;	
					}
					if(isset($savewlist)){
					echo $savewlist;	
					}
					?>
					</span>
					  <?php
				    if(isset($insertcompere)){
					echo $insertcompere;	
						}
					?>
					<?php
					$login =  Session::get("cuslogin");
			          if($login==true){ ?>
					  
				<div class="add-cart">
				  <div class="mybutton">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>
						<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
					 </form>
					 </div>
					  <div class="mybutton">
					 <form action="" method="post">
						<input type="submit" class="buysubmit" name="wlist" value="Save to List"/>
					 </form>	
					 </div>
					</div>
					
					  <?php } ?>
				</div>
			<div class="product-desc">
			<h2>PRODUCT DETAILS</h2>
			<p> <?php echo $result['body'];?></p>
			</div>
				 <?php } }?>		
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php
					  $getCat =  $cat->getAllcat();
					  
					  if($getCat){
						while($result = $getCat->fetch_assoc()){
					    ?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
					  <?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php include 'footer.php';?>