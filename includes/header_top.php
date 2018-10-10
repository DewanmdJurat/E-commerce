<?php 
if(isset($_GET['status']) && $_GET['status']=='logout'){
$ms_obj_app->logout_customer();
}
?>
<div id="top-bar">
    <div class="container clearfix">
    	<!--Social icons-->
    	<div class="top-social-icons">
        	<ul class="clearfix">
            	<li><a class="i-facbook" href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                <li><a class="i-twitter" href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                <li class="dropdown">
                    <a class="i-contact dropdown-toggle" data-toggle="dropdown" href="#">
                    	<i class="fa fa-phone"></i>
                    </a>
                    <div class="i-hover dropdown-menu">
                    	<span>01700-000000</span>
                 	</div>
                </li>
                <li class="dropdown">
                	<a class="i-email dropdown-toggle" data-toggle="dropdown" href="#">
                    	<i class="fa fa-user"></i>
                    </a>
                 	<div class="i-hover dropdown-menu">
                    	<span>eshop@gmail.com</span>
                 	</div>
                </li>
            </ul>
        </div>
        <!--End social icon-->
        <!-- Top link -->
        <div class="top-links clearfix fright">
        	<ul>
            	
                <?php if(isset($_SESSION['customer_id'])){ ?>
                <li class="dropdown">
                    <a href="index.php?status=logout">Logout</a>
                </li>
            <?php }else{ ?>
                <li class="dropdown">
                    <a href="login.php">Log In</a>
                </li>
            <?php } ?>
                
            </ul>	
        </div>
        <!-- End top link -->  	
    </div>
</div>