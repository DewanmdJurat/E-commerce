<?php 
$pages=0;
if(isset($_GET['pages'])){
    if($_GET['pages']==1){
        $pages=0;
    }else{
        $pages=$_GET['pages']*12-12;
    }
}
$query_result=$ms_obj_app->select_for_pagination($pages);

?>
<?php include 'includes/slider.php';?>   
<div class="wrapper-main brandshop clearfix">
	<div class="spacer15"></div><!--spacer-->
	<div class="container">
    	<div class="inner-block"><!------Main Inner-------->
        	<div class="row">
			<div class="col-md-12 col-sm-10">
               <div class="main-contant clearfix">
				<div class="products-grid clearfix"><!-- Start Product List -->
                    <div class="row">
                        <div class="item-block clearfix">
                            <div class="grid-control clearfix">
								<?php while($show_product=mysqli_fetch_assoc($query_result)){?>		
                                <div class="product-item side-block">
                                    <ul class="products-row">
                                        <li class="image-block" style="padding:0px;">
                                                <a href="productDetails.php?product_id=<?php echo $show_product['product_id'];?>"><span><img src="admin/<?php echo $show_product['product_image']; ?>" alt="" style="min-height:300px;"/></span></a>
                                                        <a class="add-to-cart" href="#">Add to cart</a>
                                                        
                                                        <div class="review_star p-details">
                                                           <a href="productDetails.php?product_id=<?php echo $show_product['product_id'];?>">Product Details</a>
                                                        </div>
                                                    </li>
                                                    <li class="products-details">
                                                        <a href="#">
                                                        <?php echo $show_product['product_name']; ?>
                                                        </a>
                                                        <span>BDT:<?php echo $show_product['product_price'];?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                          <?php }?>
                                           
                                        </div>
                                        <div class="spacer30"></div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="toolbar clearfix">
                                                    <div class="pager"><!--pagination -->
                                                        <ul class="pagination pull-left">
                                                            <?php
                                                        
                     $query_result=$ms_obj_app->show_product_summery();
                    $rowTotal=mysqli_num_rows($query_result);
                    $totalPage=ceil($rowTotal/12);
                    $pagenumber=$rowTotal/12;
                    // echo $totalPage;
                    if($pagenumber>1){
                    for ($i=1; $i <=$totalPage; $i++) { ?>
                                     <li><a href="?pages=<?php echo $i;?>"><?php echo $i;?></a></li>                        
                                    <?php  }}?> 
                                                        </ul>
                                                    </div><!-- End pagination -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Product List -->
                    	</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
  <style>
  .side-block{
	  margin: 5px 10px;
	  margin-bottom:15px;
	  min-height:500px;
  }
  .products-grid .item-block .product-item{
    width: 23% !important;
  }
  
  .p-details a{
    color: #ffffff;
  }
  .p-details a:hover{
    color: #ffffff;
  }
  </style>