<?php
if(isset($_GET['status'])){
  $temp_cart_id=$_GET['id'];
  $message=$ms_obj_app->delete_cart_product_by_temp_id($temp_cart_id);
}
if(isset($_POST['update'])){
$message=$ms_obj_app->quantity_update_by_id($_POST);
}
$session_id=session_id();
$query_result=$ms_obj_app->select_cart_item_by_session_id($session_id);
?>
<div class="wrapper-main brandshop clearfix">
		<div class="spacer15"></div><!--spacer-->
	<div class="container">
    	<div class="inner-block"><!------Main Inner-------->
        	<div class="row">
            	<div class="cart-main"><!-- Shopping Cart -->
                	<div class="col-md-12">
                		<div class="cart-control clearfix">
                        <h5 style="color:#157ED2;"><?php if (isset($message)) {
                          echo $message; unset($message);
                        } ?></h5>
                            <table class="table cart-table">
                                <thead>
                                    <tr>
                                        <th class="table-title">Product Name And Image</th>
                                        <th class="table-title">Product Id</th>
                                        <th class="table-title">Product Price</th>
                                        <th class="table-title">Quantity</th>
                                        <th class="table-title">SubTotal</th>
                                        <th><span class="close-button disabled"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $sub=0; while($show_cart=mysqli_fetch_assoc($query_result)){?>
                                 	<tr>
                                   		<td class="product-name-col">
                                        	<figure>
                                           		<a href="#"><img src="admin/<?php echo $show_cart['product_image'];?>" alt=""></a>
                                        	</figure>
                                         	<h2 class="product-name"><a href="#"><?php echo $show_cart['product_name']; ?></a></h2>
                                           	
                                     	</td>
                                     	<td class="product-code"><?php echo substr(md5($show_cart['product_id']), 24,32) ;?></td>
                                     	<td class="product-price-col">
                                        	<span class="product-price-special"> BDT: <?php echo $show_cart['product_price']; ?></span>
                                       	</td>
                                     	<td>
                                        <form action="" method="post">
                                       		<div class="custom-quantity-input">
                                              <input type="text" name="quantity" value="<?php echo $show_cart['product_quantity']; ?>">
                                              <input type="hidden" name="quantityId" value="<?php echo $show_cart['temp_cart_id']; ?>">
                                            	<input type="submit" name="update" value="Update">
                                       		</div>
                                        </form>
                                     	</td>
                                      	<td class="product-total-col">
                                        	<span class="product-price-special">BDT: <?php echo $total= $show_cart['product_price']*$show_cart['product_quantity']; ?></span>
                                     	</td>
                                      	<td>
                                            <a href="?status=delete&&id=<?php echo $show_cart['temp_cart_id'];?>" class="close-button">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </td>
                              		</tr>
                                <?php  $sub=$sub+$total; } ?>
                             	</tbody>
                     		</table> 
                       		<div class="spacer15"></div> 
                            <div class="row">
                                <div class="col-md-7">
                                    <!-- End .tab-container -->
                                    <div class="md-margin"></div><!-- space -->
                                    <a href="index.php" class="btn btn-custom btn-lger min-width-lg">Continue Shopping</a>
                                </div><!-- End .col-md-8 -->
                                <div class="col-md-5">
                                    <table class="table total-table">
                                        <tbody>
                                            <tr>
                                                <td class="total-table-title">Subtotal:  </td>
                                                <td>BDT: <?php echo $sub;?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="total-table-title">TAX (15%):</td>
                                                <td> BDT: <?php echo $tex=(($sub*15)/100); ?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Total:</td>
                                                <td>BDT: <?php  $gtotal=$sub+$tex; 
                                                
                                                $_SESSION['order_total']=$gtotal;
                                                echo $gtotal;
                                                ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="md-margin"></div><!-- space -->
                                    <div class="text-right">
                                      <?php  
                                      $customer_id=isset($_SESSION['customer_id']); 
                                      $shipping_id=isset($_SESSION['shipping_id']);
                                      if($customer_id!=NULL && $shipping_id!=NULL){ ?>
                                        <a href="payment.php" class="btn btn-custom btn-lger min-width-sm">Checkout</a>
                                       
                                      <?php }elseif($customer_id!=NULL && $shipping_id==NULL){ ?>
                                        <a href="shipping.php" class="btn btn-custom btn-lger min-width-sm">Checkout</a>
                                      <?php }else{ ?>
                                         <a href="checkout.php" class="btn btn-custom btn-lger min-width-sm">Checkout</a>
                                      <?php  } ?>
                                    </div>
                                </div><!-- End .col-md-4 -->
                            </div><!-- End .row -->
                        </div>
                    </div>
                </div><!-- End Shopping Cart -->
            </div>
        </div>
    </div>
    <div class="spacer30"></div><!--spacer-->
    <!--XXXXXXXXXX-- End Footer --XXXXXXXXXX-->
</div>