<?php

$result_category=$ms_obj_sadmin->select_published_category_info();
$result_manufacturer=$ms_obj_sadmin->select_published_manufacturer_info();
if(isset($_GET['product_id'])){
$product_id=$_GET['product_id'];
$result_product=$ms_obj_sadmin->select_product_by_id_for_edit($product_id);
$show=mysqli_fetch_assoc($result_product);
}
if(isset($_POST['btn'])){
	$ms_obj_sadmin->update_product_details_by_id($_POST);
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit product</h2>
			<div class="box-icon">
				
			</div>
		</div>
		<h2 class="text-success text-center"><?php if(isset($message)){ echo $message;}?></h2>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post" name="productDetailsForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="typeahead"> Product Name </label>
						<div class="controls">
							<input type="text" name="product_name"  class="span6 typeahead" id="typeahead" value="<?php echo $show['product_name'];?>" data-provide="typeahead" >
							<input type="hidden" name="productId"  class="span6 typeahead" id="typeahead" value="<?php echo $show['product_id'];?>" data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Category Name</label>
						<div class="controls">
							<select id="selectError3" name="category_id">
								<option>--Select Publication Status--</option>
								<?php while ($show_category=mysqli_fetch_assoc($result_category)){?>
								<option value="<?php echo $show_category['category_id'];?>"><?php echo $show_category['category_name'];?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Manufacturer Name</label>
						<div class="controls">
							<select id="selectError3" name="manufacturer_id">
								<option>--Select Publication Status--</option>
								<?php while($show_manufacturer=mysqli_fetch_assoc($result_manufacturer)){?>
								<option value="<?php echo $show_manufacturer['manufacturer_id']; ?>"> <?php echo $show_manufacturer['manufacturer_name'] ; ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead"> Product Price </label>
						<div class="controls">
							<input type="number" name="product_price"  class="span6 typeahead" value="<?php echo $show['product_price'];?>" id="typeahead"  data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead"> Stock Amount </label>
						<div class="controls">
							<input type="number" name="stock_amount"  class="span6 typeahead" value="<?php echo $show['stock_amount'];?>" id="typeahead"  data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead"> Minimum Stock Amount </label>
						<div class="controls">
							<input type="text" name="minimum_stock_amount"  class="span6 typeahead" value="<?php echo $show['minimum_stock_amount'];?>" id="typeahead"  data-provide="typeahead" >
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Short Description</label>
						<div class="controls">
							<textarea class="cleditor" name="product_short_description" id="textarea2" rows="3"> <?php echo $show['product_short_description'];?></textarea>
						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Long Description</label>
						<div class="controls">
							<textarea class="cleditor" name="product_long_description" id="textarea2" rows="3"><?php echo $show['product_long_description'];?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Publication Status</label>
						<div class="controls">
							<select id="selectError3" name="publication_status">
								<option>--Select Publication Status--</option>
								<option value="1"> Published</option>
								<option value="0"> Unpublished</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="btn">Update Product Info</button>
						<button type="reset" class="btn">Reset</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<script >
	document.forms['productDetailsForm'].elements['category_id'].value=<?php echo $show['category_id']; ?>

	document.forms['productDetailsForm'].elements['manufacturer_id'].value=<?php echo $show['manufacturer_id']; ?>

	document.forms['productDetailsForm'].elements['publication_status'].value=<?php echo $show['publication_status']; ?>

	

</script>