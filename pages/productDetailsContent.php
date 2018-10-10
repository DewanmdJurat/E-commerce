<?php 
$product_id=$_GET['product_id'];
$query_result=$ms_obj_app->select_product_details_by_id($product_id);
$show_details=mysqli_fetch_assoc($query_result);


if(isset($_POST['btn'])){
	$ms_obj_app->add_to_cart($_POST);
}
?>
<div class="wrapper-main brandshop clearfix">
        	<div class="spacer15"></div><!--spacer-->
        	<div class="container">
            	<div class="inner-block"><!------Main Inner-------->
                	<div class="row">
                        <div class="col-md-12 col-sm-11">
                        	<div class="main-contant xs-spacer20 clearfix">
                            	<div class="contant-wrapper">
                                    <div class="details-view"><!-- Start Product Details -->
                                        <div class="clearfix">
                                            <div class="product-img"><!-- Product Images -->
                                                <div id="info-img">
                                                   
                                                    <div class="swiper-container top-img">
                                                        <div class="swiper-wrapper"><!-- Images Slider -->
                                                            <div class="swiper-slide"><img data-zoom-image="admin/<?php echo $show_details['product_image'];?>" src="admin/<?php echo $show_details['product_image']; ?>" alt="" width="100%"/></div>
                                                            
                                                            
                                                        </div>
                                                        <!-- Add Arrows -->
                                                        <div class="swiper-button-next s-nav fa fa-angle-right"></div>
                                                        <div class="swiper-button-prev s-nav fa fa-angle-left"></div>
                                                    </div>
                                                    <div class="product-thumbs clearfix"><!-- Thumb Images -->
                                                        <div data-index="0" class="thumb-item active"><img src="admin/<?php echo $show_details['product_image']; ?>" alt="" /></div>
                                                      
                                                    </div>
                                                </div>
                                            </div><!-- End Product Images -->
                                            <div class="product-info">
                                                <h4><?php echo $show_details['product_name']; ?></h4>
                                                <div class="price-box">
                                                    <p class="new-price"><span>BDT: <?php echo $show_details['product_price']; ?></span></p>
                                                </div>
                                                <span class="product_stock">Available in stock(<?php echo $show_details['stock_amount']; ?>)</span>
                                                <div class="short-description">
                                                    <p><?php echo $show_details['product_short_description']; ?> </p>
                                                </div>
                                                <div class="product_review clearfix">
                                                   
                                                    
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-4 xs-spacer20">
                                                    <form action="" method="post"  >
                                                        <div class="qty_wrap">
                                                            <label for="prod_qty">Qty:</label><input type="number" min="1" max="2" id="prod_qty" name="product_quantity" class="spinc" value="1"  />
                                                            <input type="hidden" name="product_id"  value="<?php echo $show_details['product_id'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="cart-btn col-sm-4 col-xs-6">
                                                        <button class="btn btn-default " name="btn" type="submit">Add to Cart</button>
                                                    </div>
												</form>    
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div><!-- End Product Details -->
        							<div class="spacer30"></div><!--spacer-->
                                    <div class="tab-panel clearfix"><!-- Tab -->
                                        <!-- Tabs Nav -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                           
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="description" class="tab-pane active fade in" role="tabpanel">
                                                <div>
                                                    <p><?php echo $show_details['product_long_description']; ?></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
        							<div class="spacer30"></div><!--spacer-->
                                    
                            	 </div> <!--content warp end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
