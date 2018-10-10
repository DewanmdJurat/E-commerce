<?php 
$reslut=$ms_obj_sadmin->select_product_name_for_image();
if(isset($_POST['btn'])){
	$message=$ms_obj_sadmin->save_image_by_product_id($_POST);
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
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="btn">Save Product Image</button>
						<button type="reset" class="btn">Reset</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>			
