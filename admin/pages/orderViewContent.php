<?php 
$order_result=$ms_obj_sadmin->order_summery();
// echo "<pre>";
// print_r($order_result);
// exit();
if(isset($_GET['status'])){
	$order_id=$_GET['order_id'];
	if($_GET['status']=='pending'):
	$message=$ms_obj_sadmin->order_complete_update_by_order_id($order_id);
	elseif($_GET['status']=='complete'):
		$message=$ms_obj_sadmin->order_pending_update_by_order_id($order_id);
	elseif ($_GET['status']=='cancle'):
		$message=$ms_obj_sadmin->order_cancle_by_order_id($order_id);
	
	endif;
}
?>


<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Manage Order  </h2>
			<div class="box-icon">
			</div>
		</div>
		<h2 class=" text-success text-center"><?php if(isset($message)){ echo $message;}?></h2>
		<h2 class=" text-success text-center"><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);} ?></h2>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Order Id</th>
						<th>Customer Name</th>
						<th>Order Status</th>
						<th>Order Total</th>
						<th>Payment Type</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>
					<?php $i=1; while($result=mysqli_fetch_assoc($order_result)){   ?>
					<tr>
						<td class="center"><?php echo $result['order_id'];?></td>
						<td class="center"><?php echo $result['firstName'].' '.$result['lastName'];?></td>
						<td class="center"><?php echo $result['order_status']; ?></td>
						<td class="center"><?php echo $result['order_total']; ?></td>
						<td class="center"><?php echo $result['payment_type']; ?></td>
						<td class="center"> 
							<a class="btn btn-info" href="viewOrder.php?order_id=<?php echo $result['order_id'];?>" title="Order View"><i class="halflings-icon white zoom-in "></i></a>
							
							<?php if($result['order_status']=='pending'): ?>
							<a class="btn btn-info" href="orderView.php?status=pending&&order_id=<?php echo $result['order_id'];?>" title="Order Complete">
							<i class="halflings-icon white arrow-down"></i></a>
							<?php else: ?>
							<a class="btn btn-info" href="orderView.php?status=complete&&order_id=<?php echo $result['order_id'];?>" title="Order Pending">
							<i class="halflings-icon white arrow-up"></i></a>
							<?php endif ?>
							<a class="btn btn-info" href="orderView.php?status=cancle&&order_id=<?php echo $result['order_id'];?>" title="Cancel Order" onclick="alert('are you sure to cancle order')">
							<i class="halflings-icon white edit"></i></a>
							
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