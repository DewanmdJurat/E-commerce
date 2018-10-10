<?php 
$category_id=$_GET['category_id'];
$query_result=$ms_obj_sadmin->select_category_by_id($category_id);
$showCategory=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])){
	$ms_obj_sadmin->update_category_info_by_id($_POST);
}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category  </h2>
			<div class="box-icon">
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post" name="categoryForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="typeahead"> Category Name </label>
						<div class="controls">
							<input type="text" name="category_name" value="<?php echo $showCategory['category_name']; ?>"  class="span6 typeahead" id="typeahead"  data-provide="typeahead" >
							<input type="hidden" name="categoryId" value="<?php echo $showCategory['category_id']; ?>"  class="span6 typeahead" id="typeahead"  data-provide="typeahead" >
							  </div>
						</div>
						<div class="control-group hidden-phone">
							<label class="control-label" for="textarea2">Category Description</label>
							<div class="controls">
								<textarea class="cleditor" name="category_description" id="textarea2" rows="3"><?php echo $showCategory['category_description']; ?></textarea>
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
							<button type="submit" class="btn btn-primary" name="btn">Update Category Info</button>
							<button type="reset" class="btn">Reset</button>
						</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>			
<script type="text/javascript">
	document.forms['categoryForm'].elements['publication_status'].value=<?php echo $showCategory['publication_status']; ?>
</script>