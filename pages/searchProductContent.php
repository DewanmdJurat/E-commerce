<?php

if(!isset($_GET['search']) || $_GET['search']==NULL){
  header("Location:404.php");
}else{
  $search=$_GET['search']; 
  $result=$ms_obj_app->select_search_result($search);
}

?>
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
								<?php if($result){ while($show_product=mysqli_fetch_assoc($result)){?>		
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
                                          <?php } }else{?>
                                            <p>Not match your Text</p>
                                           <?php }?>
                                        </div>
                                        <div class="spacer30"></div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="toolbar clearfix">
                                                    <div class="pager"><!--pagination -->
                                                        <ul class="pagination pull-left">
                                                        	 

				
                          <li><a href=""><?php ?></a></li>
                                             
                                                         
                                                        </ul>
                                                    </div><!-- End pagination -->
                                                    <div class="sorter"><!--pagination-info -->
                                                        <p>Items 1 to 16 of 73 total</p>
                                                    </div><!-- End pagination-info -->
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