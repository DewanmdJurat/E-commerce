<?php if($_SESSION['customer_id']==NULL && $_SESSION['shipping_id']==NULL){
header('Location:index.php');
}elseif ($_SESSION['customer_id']!=NULL && $_SESSION['shipping_id']==NULL) {
    header('Location:shipping.php');
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
                                <h2><?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']); } ?></h2><br>
                            	
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