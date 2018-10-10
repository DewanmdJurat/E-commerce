<?php 
	if(isset($_POST['btn'])){
		$message=$ms_obj_sadmin->save_manufacturer_info($_POST);
	}
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacturer  </h2>
			<div class="box-icon">
			</div>
		</div>
		<h2 class=" text-success text-center"><?php if(isset($message)){ echo $message;}?></h2>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="typeahead"> Category Name </label>
						<div class="controls">
							<input type="text" name="manufacturer_name"  class="span6 typeahead" id="typeahead"  data-provide="typeahead" >
							  </div>
						</div>
						<div class="control-group hidden-phone">
							<label class="control-label" for="textarea2">Category Description</label>
							<div class="controls">
								<textarea class="cleditor" name="manufacturer_description" id="textarea2" rows="3"></textarea>
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
							<button type="submit" class="btn btn-primary" name="btn">Save Manufacturer Info</button>
							<button type="reset" class="btn">Reset</button>
						</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>			
