<?php
$order_id=$_GET['order_id'];

 $customer_result=$ms_obj_sadmin->select_customer_info_by_order_id($order_id);
 $c_result=mysqli_fetch_assoc($customer_result); 

 $shipping_info=$ms_obj_sadmin->select_shipping_info_by_order_id($order_id);
 $s_result=mysqli_fetch_assoc($shipping_info);
 $payment_info=$ms_obj_sadmin->select_payment_info_by_order_id($order_id);
 $p_result=mysqli_fetch_assoc($payment_info);
 $product_info=$ms_obj_sadmin->select_product_info_by_order_id($order_id);
 
// echo "<pre>";
// print_r($product_info);
// exit();
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Order View</h2>
			<div class="box-icon">
			</div>
		</div>
		<h2 class=" text-success text-center"><?php if(isset($message)){ echo $message;}?></h2>
		<h2 class=" text-success text-center"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);} ?></h2>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<h2>Customer Info</h2>
				<tr>
					<td>Customer Name</td>
					<td><?php echo $c_result['firstName'].' '.$c_result['lastName'];?></td>
				</tr>
				<tr>
					<td>Email Address</td>
					<td><?php echo $c_result['customerEmail']; ?> </td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><?php echo $c_result['phoneNumber']; ?> </td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo $c_result['city']; ?> </td>
				</tr>
				<tr>
					<td>District</td>
					<td><?php echo $c_result['district']; ?> </td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $c_result['address']; ?> </td>
				</tr>
			</table>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<h2>Shipping Info</h2>
				<tr>
					<td>Customer Name</td>
					<td><?php echo $s_result['fullName']; ?> </td>
				</tr>
				<tr>
					<td>Email Address</td>
					<td><?php echo $s_result['customerEmail']; ?> </td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><?php echo $s_result['phoneNumber']; ?> </td>
				</tr>
				<tr>
					<td>City</td>
					<td><?php echo $s_result['city']; ?> </td>
				</tr>
				<tr>
					<td>District</td>
					<td><?php echo $s_result['district']; ?> </td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $s_result['address']; ?> </td>
				</tr>
			</table>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<h2>Payment Info</h2>
				<tr>
					<td>Payment Type</td>
					<td><?php echo $p_result['payment_type']; ?> </td>
				</tr>
				<tr>
					<td>Payment Status</td>
					<td><?php echo $p_result['payment_status']; ?> </td>
				</tr>
			</table>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<h2>Product Info</h2>
				<tr>
					<td>Product Id</td>
					<td>Product Name</td>
					<td>Product Image</td>
					<td>Product price</td>
					<td>Product Quantity</td>
					<td>Total Price</td>
					
				</tr>
				<?php $i=1; while($product_result=mysqli_fetch_assoc($product_info)){
					// echo "<pre>";
					// print_r($product_result);
					// exit();
					?>
				<tr>
					<td><?php echo $product_result['order_details_id']; ?></td>
					<td><?php echo $product_result['product_name']; ?></td>
					<td><img src="<?php echo $product_result['product_image']; ?>" alt="<?php echo $product_result['product_name']; ?>" width="200" height="150"></td>
					<td>BDT:<?php echo $product_result['product_price']; ?></td>
					<td><?php echo $product_result['product_quantity']; ?></td>
					<td>BDT:<?php echo $product_result['product_quantity'] * $product_result['product_price']; ?></td>
					
					
				</tr>
				<?php $i++; } ?>
			</table>
		</div>
	</div>
</div>	