<?php 
$total_product=$ms_obj_sadmin->total_product_has();
$total_products=mysqli_num_rows($total_product);
$order=$ms_obj_sadmin->total_order();
$total_order=mysqli_num_rows($order);
$customer=$ms_obj_sadmin->total_customer();
$total_customer=mysqli_num_rows($customer);
?>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="admin_master.php">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="admin_master.php">Dashboard</a></li>
</ul>

<div class="row-fluid">	

	<a class="quick-button metro yellow span2">
		<i class="icon-group"></i>
		<p>Customers</p>
		<span class="badge"><?php echo $total_customer;?></span>
	</a>
	<a class="quick-button metro blue span2">
		<i class="icon-shopping-cart"></i>
		<p>Orders</p>
		<span class="badge"><?php echo $total_order;?></span>
	</a>
	<a class="quick-button metro green span2">
		<i class="icon-barcode"></i>
		<p>Products</p>
		<span class="badge"><?php echo $total_products;?></span>
	</a>

	<div class="clearfix"></div>
					
</div><!--/row-->
			
       

	