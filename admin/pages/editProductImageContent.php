<?php 
$image_id=$_GET['image_id'];
$query_result=$ms_obj_sadmin->select_image_by_id($image_id);
$show_image=mysqli_fetch_assoc($query_result);
$reslut=$ms_obj_sadmin->select_product_name_for_image();
if(isset($_POST['btn'])){
	$message=$ms_obj_sadmin->update_product_image_by_id($_POST);
}

?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category  </h2>
			<div class="box-icon">
			</div>
		</div>
		<h2 class=" text-success text-center"><?php if(isset($message)){ echo $message;}?></h2>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="productImageForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="selectError3">Product Name</label>
						<div class="controls">
							<select id="selectError3" name="product_id">
								<option>--Select Product Name--</option>
								<?php while($show=mysqli_fetch_assoc($reslut)){  ?>
								<option value="<?php echo $show['product_id'];?>"><?php echo $show['product_name'];?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Image</label>
						<div class="controls">
							<input class="cleditor" name="product_image" type="file" id="textarea2">
							<input class="cleditor" name="image_id" type="hidden" value="<?php echo $show_image['image_id']; ?>" id="textarea2">
							<img src="<?php echo $show_image['product_image'];?>" alt="" width="100" height="100" >
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="btn">Update Image</button>
						<button type="reset" class="btn">Reset</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>			
<script type="text/javascript">
	document.forms['productImageForm'].elements['product_id'].value=<?php echo $show_image['product_id'];?>
</script>