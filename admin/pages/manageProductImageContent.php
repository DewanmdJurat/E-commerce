<?php 
$query_result=$ms_obj_sadmin->select_all_product_image();

?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Manage Product Images</h2>
			<div class="box-icon">
			</div>
		</div>
		<h2 class=" text-success text-center"><?php if(isset($message)){ echo $message;}?></h2>
		<h2 class=" text-success text-center"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);} ?></h2>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Serial No</th>
						<th>Product Name</th>
						<th>Product Image</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i=1; while($showProductImage=mysqli_fetch_assoc($query_result)){ ?>
					<tr>
						<td><?php echo $i;?></td>
						<td class="center"><?php echo $showProductImage['product_name'];?></td>
						<td class="center"><img src="<?php echo $showProductImage['product_image'];?>" alt="" width="100" height="100"></td>
						
						<td class="center">
							<a class="btn btn-info" href="editproductImage.php?image_id=<?php echo $showProductImage['image_id'];?>" title="Edit">
							<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="?status=delete&&id=<?php echo $showProductImage['image_id'] ;?>" title="Delete" onclick="return check_delete();">
							<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>	