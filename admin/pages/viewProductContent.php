<?php 

$product_id=$_GET['product_id'];
$result_product=$ms_obj_sadmin->select_product_details_for_show_details($product_id);
$show=mysqli_fetch_assoc($result_product);




?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacturer  </h2>
			<div class="box-icon">
			</div>
		</div>
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
			
			<tr>
				<td class="center">Product Name</td>
				<td><?php echo $show['product_name'];?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php echo $show['category_name'];?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php echo $show['manufacturer_name'];?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php echo $show['product_price'];?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php echo $show['stock_amount'];?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php echo $show['minimum_stock_amount'];?></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td><?php  echo $show['product_short_description'];?></td>
			</tr>
			<tr>
				<td>Product Long Description</td>
				<td><?php  echo $show['product_long_description'];?></td>
			</tr>
			<tr>
				<td>Product Image</td>
				<td>
					
				<img src="<?php  echo $show['product_image'];?>" width="200" height="150" />
				
			</td>
			</tr>
			<tr>
				<td>publication Status</td>
				<td><?php  if($show['publication_status']==1){ echo "published"; }else{echo "unpublished";} ?></td>
			</tr>
		
		</table>
	</div>
</div>