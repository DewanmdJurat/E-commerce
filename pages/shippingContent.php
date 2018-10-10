<?php 
if($_SESSION['customer_id']==NULL){
header('Location:index.php');
}
$customer_id=$_SESSION['customer_id'];
$query_result=$ms_obj_app->select_customer_info_by_id($customer_id);
$show_info=mysqli_fetch_assoc($query_result);
if(isset($_POST['info'])){
	$ms_obj_app->validation($_POST['info']);
	$ms_obj_app->shipping_info_save($_POST);
}
?>
<div class="wrapper-main brandshop clearfix">
	<div class="spacer30"></div><!--spacer-->
	<div class="container">
    	<div class="inner-block"><!------Main Inner-------->
        	<div class="row">
            	<div class="sign-main"><!-- Start Sign -->
                    <div class="sign-details clearfix"><!-- Start Form -->
                    	
                        <div class="col-sm-6 col-sm-offset-3 contact-form">
                        	<div class="new-account">
                            	<div class="sign-block">
                            		<h4>Shipping Information</h4>
                            		<p class="text-justify">Welcom <?php echo $_SESSION['fullName'];?> your shipping information here.if you want to change it you do it.</p>
                                <form action="" method="post" id="shippingform" >
                                    <ul>
                                        <li class="form-group">
                                            <label for="name">Full Name<span>*</span></label>
                                            <input type="text" id="name" class="form-control" name="fullName" value="<?php echo $show_info['firstName'].' '.$show_info['lastName']; ?>" required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="email-1">Email Address <span>*</span></label>
                                            <input type="email" id="email-1" class="form-control" name="customerEmail" value="<?php echo $show_info['customerEmail']; ?>" required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">Phone Number<span>*</span></label>
                                            <input type="number" id="pn" class="form-control" name="phoneNumber" value="<?php echo $show_info['phoneNumber']; ?>" required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">City<span>*</span></label>
                                            <input type="text" id="pn" class="form-control" name="city" value="<?php echo $show_info['city']; ?>" required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">District<span>*</span></label>
                                            <input type="text" id="pn" class="form-control" name="district" value="<?php echo $show_info['district']; ?>" required />
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">Address<span>*</span></label>
                                            <textarea type="text" id="pn" class="form-control" name="address" ><?php echo $show_info['address'];required ?> </textarea>
                                        </li>
                                        <li>
                                             <button class=" btn btn-info btn-block" type="submit" name="info" >Shipping Info</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div><!-- End Form -->
                </div><!-- End Sign -->
            </div>
        </div>
    </div>
</div>
