<?php
ob_start(); 
session_start();
$admin_id=$_SESSION['admin_id'];
if($admin_id==NULL){
	header('Location:index.php');
}
require '../classes/SuperAdmin.php';
$ms_obj_sadmin=new SuperAdmin();

if(isset($_GET['status'])){
	if($_GET['status']=='logout'){
	require '../classes/admin_login.php';
	$ms_obj_admin= new AdminLogin();
	$ms_obj_admin->logout();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="../assets/admin_asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/admin_asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../assets/admin_asset/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../assets/admin_asset/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<link rel="shortcut icon" href="../assets/admin_asset/img/favicon.ico">
	<!-- end: Favicon -->
	<script type="text/javascript">
		function check_delete(){
			var check=confirm('Are You sure to delete this?');
			if(check){
				return true;
			}else{
				return false;
			}
		}
	</script>	
		
</head>
<body>
		<!-- start: Header -->
	<?php include 'includes/header.php'; ?>
	<!-- end: Header -->
	
		<div class="container-fluid-full">
			<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php include 'includes/sidebar_menu.php';?>
			<!-- end: Main Menu -->
			
			<!-- start: Content -->
				<div id="content" class="span10">

				<?php
					if(isset($pages)){
						if($pages=='categoryAdd'){
							include 'pages/categoryContent.php';
						}elseif ($pages=='manageCategory') {
							include 'pages/manageCategoryContent.php';
						}elseif ($pages=='editCategory') {
							include 'pages/editCategoryContent.php';
						}elseif ($pages=='manufacturerAdd') {
							include 'pages/manufacturerContent.php';
						}elseif ($pages=='manageManufacturer') {
							include 'pages/manageManufacturerContent.php';
						}elseif ($pages=='editManufacturer') {
							include 'pages/editManufacturerContent.php';
						}elseif ($pages=='productAdd') {
							include 'pages/productContent.php';
						}elseif ($pages=='manageProduct') {
							include 'pages/manageProductContent.php';
						}elseif ($pages=='viewProduct') {
							include 'pages/viewProductContent.php';
						}elseif ($pages=='editProduct') {
							include 'pages/editProductContent.php';
						}elseif ($pages=='productImage') {
							include 'pages/productImageContent.php';
						}elseif($pages=='manageProductImage'){
							include 'pages/manageProductImageContent.php';
						}elseif($pages=='editProductImage'){
							include 'pages/editProductImageContent.php';
						}elseif($pages=='orderView'){
							include 'pages/orderViewContent.php';
						}elseif($pages=='viewOrder'){
							include 'pages/viewOrderContent.php';
						}elseif($pages=='sliderAdd'){
							include 'pages/sliderAddContent.php';
						}
					}else{
					include 'pages/home_content.php';
					}

					 ?>
				</div>
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		

	<div class="clearfix"></div>
	
	<?php include'includes/footer.php';?>
	
	<!-- start: JavaScript-->

		<script src="../assets/admin_asset/js/jquery-1.9.1.min.js"></script>
	<script src="../assets/admin_asset/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.ui.touch-punch.js"></script>
	
		<script src="../assets/admin_asset/js/modernizr.js"></script>
	
		<script src="../assets/admin_asset/js/bootstrap.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.cookie.js"></script>
	
		<script src='../assets/admin_asset/js/fullcalendar.min.js'></script>
	
		<script src='../assets/admin_asset/js/jquery.dataTables.min.js'></script>

		<script src="../assets/admin_asset/js/excanvas.js"></script>
	<script src="../assets/admin_asset/js/jquery.flot.js"></script>
	<script src="../assets/admin_asset/js/jquery.flot.pie.js"></script>
	<script src="../assets/admin_asset/js/jquery.flot.stack.js"></script>
	<script src="../assets/admin_asset/js/jquery.flot.resize.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.chosen.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.uniform.min.js"></script>
		
		<script src="../assets/admin_asset/js/jquery.cleditor.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.noty.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.elfinder.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.raty.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.iphone.toggle.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.gritter.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.imagesloaded.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.masonry.min.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.knob.modified.js"></script>
	
		<script src="../assets/admin_asset/js/jquery.sparkline.min.js"></script>
	
		<script src="../assets/admin_asset/js/counter.js"></script>
	
		<script src="../assets/admin_asset/js/retina.js"></script>

		<script src="../assets/admin_asset/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
