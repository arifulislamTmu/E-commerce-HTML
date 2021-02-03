<?php include 'header.php';?>
<?php include 'sidebar.php';?>


<?php
  if(isset($_GET['shiftid'])){
	  $id = $_GET['shiftid'];
	  $date = $_GET['time'];
	  $shift = $ct->productShifted($id,$date);
  }
    if(isset($_GET['delproid'])){
	  $id = $_GET['delproid'];
	  $date = $_GET['time'];
	  $Delorder = $ct->productdelet($id,$date);
  }
   
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
				<?php
				  if(isset($shift)){
					  
					  echo $shift;
					  
				  }
				  if(isset($Delorder)){
					  
					  echo $Delorder;
					  
				  }
				
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Customer Id</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer Id</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					 $getOrder = $ct->getOrderpro();
					 if($getOrder){
						 
						 while($result = $getOrder->fetch_assoc()){ ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php echo $result['ProductName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['cmrId'];?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId'];?>">View Details</a></td>
							<?php
							
							 if($result['status']=='0'){ ?>
								 <td><a href="?shiftid=<?php echo $result['cmrId'];?> & price =<?php echo $result['price'];?> & time=<?php echo $result['date'];?>">Shifted</a></td>
							 <?php }

							 elseif($result['status']=='1'){ ?>
								  <td>Pending</td>
							 
							 <?php }
							 
							 else{ ?>
						
							<td><a href="?delproid=<?php echo $result['cmrId'];?> & price =<?php echo $result['price'];?> 
							
							& time=<?php echo $result['date'];?>">Removed</a></td>
							 <?php } ?>

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
