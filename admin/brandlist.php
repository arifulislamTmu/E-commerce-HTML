 <?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php include 'Brand.php';?>
<?php
 $brand = new Brand();
 /* 
   if(isset($_GET['delbrand'])){
	   $id = preg_replace('/[^-a-zA-09_]/','',$_GET['delbrand']);
	   $delbrand = $cat->delbrandById($id);
   }
 
 */
 
   if(isset($_GET['delbrand'])){
	   $id = $_GET['delbrand'];
	   $delbrand = $brand->delbrandById($id);
   }

 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">  
					<?php
				
					 if(isset($delbrand)){
						 
						 echo $delbrand;
					 }
				
					?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					 $getBrand = $brand->getAllBrand();
					
					if($getBrand){
						$i=0;
						while($result = $getBrand->fetch_assoc()){
							$i++;
								?>
						<tr class="odd gradex">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href ="brandedit.php?brandId=<?php echo $result['brandId']; ?>">Edit</a>||
							<a onclick="return confirm('Are you sure to delete')" href="?delbrand=<?php echo $result['brandId']; ?>">Delete</a></td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'footer.php';?>

