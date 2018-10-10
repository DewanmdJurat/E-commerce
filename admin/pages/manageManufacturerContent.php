<?php 
if(isset($_GET['status'])){
	$manufacturer_id=$_GET['id'];
	if($_GET['status']=='unpublished'){
		$message=$ms_obj_sadmin->unpublished_manufacturer_info($manufacturer_id);
	}elseif ($_GET['status']=='published') {
		$message=$ms_obj_sadmin->published_manufacturer_info($manufacturer_id);
	}elseif ($_GET['status']=='delete') {
		$message=$ms_obj_sadmin->delete_manufacturer_info($manufacturer_id);
	}
}
$query_result=$ms_obj_sadmin->select_all_manufacturer_info();
?>


<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Manage Manufacturer  </h2>
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
						<th>Manufacturer Name</th>
						<th>Manufacturer Description</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i=1; while($showManufacturer=mysqli_fetch_assoc($query_result)){ ?>
					<tr>
						<td><?php echo $i;?></td>
						<td class="center"><?php echo $showManufacturer['manufacturer_name'];?></td>
						<td class="center"><?php echo $showManufacturer['manufacturer_description'];?></td>
						<td class="center">
							<?php if($showManufacturer['publication_status']==1){echo 'Published'; }else{echo "Unpublished";} ?>
						</td>
						<td class="center">
							<?php if($showManufacturer['publication_status']==1){?>
							<a class="btn btn-success" href="?status=unpublished&&id=<?php echo $showManufacturer['manufacturer_id']; ?>" title="Unpublished">
							<i class="halflings-icon white arrow-down"></i>  
							</a>
							<?php }else{?>
							<a class="btn btn-danger" href="?status=published&&id=<?php echo $showManufacturer['manufacturer_id'] ;?>" title="Published">
							<i class="halflings-icon white arrow-up"></i>  
							</a>
							<?php }?>
							<a class="btn btn-info" href="editManufacturer.php?manufacturer_id=<?php echo $showManufacturer['manufacturer_id'];?>" title="Edit">
							<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="?status=delete&&id=<?php echo $showManufacturer['manufacturer_id'] ;?>" title="Delete" onclick="return check_delete();">
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