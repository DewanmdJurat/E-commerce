<?php 
$query_result=$ms_obj_app->count_temp_product_by_session_id();
$product_row=mysqli_num_rows($query_result);

// if(isset($_POST['search'])){
//     $result=$ms_obj_app->select_search_result($_POST);
// }
?>
<div class="header-wrapper">
	<div class="container clearfix">
    	<!-- logo -->
    	<div class="logo">
        	<h1 class="clearfix">
            	<a href="index.php">
                	<img src="assets/FrontEnd/images/logo-white.png" alt="logo"/>
                </a>
            </h1>
        </div>
        <!--End logo -->
        <div class="fright clearfix">
            <div class="right-wrapper">
            	<!--<div class="wb-block">
                	<span>Welcome to EShop</span>
                </div>-->
            	<div class="search"><!--Search-->
            		<!-- <a href=""><i class="fa fa-search"></i></a> -->
                    <form action="searchProduct.php" method="get" class="search-area" >
                        <input type="text" name="search" id="search_text" class="s" placeholder="Search entry site here...">
                        <button type="submit" name="submit">Search</button>  
                        <!-- <a href="" class="search-close"><i class="fa fa-close"></i></a> --> 
                    </form>
                </div><!--End Search-->
                <div class="cart"><!--Start Cart-->
                	<a href="cart.php">
                        <i class="fa fa-shopping-cart dropdown-toggle" data-toggle="dropdown"></i>
                        <span class="cart-block pull-right">
                            <span class="cart-num">Cart <?php echo $product_row;?></span>
                        </span>
                    </a>
                    
                </div><!--End Cart-->
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .cart a span {
        color:#fff !important;
        font-size: 18px;
    }
    .cart-num{
        padding:2px;
    }
    .search-area {
    min-width: 397px;
    }
    .search-area input {
    padding: 5px 14px;
    font-size: 16px;
    border-radius: 4px;
    width: 72%;
    }
    form.search-area button {
    font-size: 16px;
    padding: 4px 7px;
    color: black;
    border-radius: 6px;
    background: #e9e9e9;
    }
</style>
