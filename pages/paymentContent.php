<?php 
if($_SESSION['customer_id']==NULL && $_SESSION['shipping_id']==NULL){
header('Location:index.php');
}elseif ($_SESSION['customer_id']!=NULL && $_SESSION['shipping_id']==NULL) {
    header('Location:shipping.php');
}
if(isset($_POST['btnpayment'])){
    $ms_obj_app->save_payment_info_by_customer($_POST);
}
?>
<div class="wrapper-main brandshop clearfix">
	<div class="spacer30"></div><!--spacer-->
	<div class="container">
    	<div class="inner-block"><!------Main Inner-------->
        	<div class="row">
            	<div class="sign-main"><!-- Start Sign -->
                    <div class="sign-details clearfix"><!-- Start Form -->
                    	<div class="col-sm-6 col-sm-offset-2 contact-form">
                        	<div class="sign-block">
                                <h2>Payment Method</h2><br>
                            	<p >you have to give us payment information.</p><br>
                                
                                 <form action="" method="post">
                                     <div class="payment-options">
                                    <span>
                                        <label><input type="radio" value="cash_ondelivery" name="payment_type"> Cash on Delevery</label>
                                    </span>
                                    <span>
                                        <label><input type="radio" value="paypal" name="payment_type">Paypal</label>
                                    </span>
                                    <span>
                                        <label><input type="radio" value="bkash" name="payment_type"> Bkash</label>
                                    </span>
                                    <span><button type="submit" class="btn btn-primary" name="btnpayment" value="Confirm_order">Confirm Order</button></span>
                                </div>
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
<style type="text/css">
    .payment-options span{
        margin-right: 20px;
    }
    .payment-options input{
        margin-right: 10px;
    }
</style>