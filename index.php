<?php 
ob_start();
session_start();
include 'classes/application.php';
$ms_obj_app=new Application();
?>
<!doctype html>
<html dir="ltr" lang="en-US">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="EShop" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Eshop</title>
    <link href="assets/FrontEnd/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/swiper.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/overright.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/colors.css" rel="stylesheet" type="text/css"/>
    <link href="assets/FrontEnd/css/responsive.css" rel="stylesheet" type="text/css"/>
</head>
<body class="blue">
    <!--------------Start wrapper-------------->
	<div id="wrapper" class="clearfix">
    	<!--------------Top bar-------------->
    	<?php include'includes/header_top.php';?>
        <!--------------End top bar-------------->
        <!--------------Header-------------->
        <header id="header">
        <?php include'includes/header_middle.php';?>
            <!-- End navigation -->
            <?php include 'includes/header_bottom.php';?>
        </header>
        <!--------------End header-------------->
        <!--------------Slider and categories-------------->
        
        <!--------------End slider and categories-------------->            
     	<div class="spacer30"></div><!--spacer-->
        <!--------------Start wrapper main-------------->
        <div class="wrapper-main">
           
        <?php 
                if(isset($pages)){
                    if($pages=='productDetails'){
                        include 'pages/productDetailsContent.php';
                    }elseif($pages=='cartContent'){
                        include 'pages/cartContent.php';
                    }elseif($pages=='checkoutContent'){
                        include 'pages/checkoutContent.php';
                    }elseif($pages=='shippingAddres'){
                        include 'pages/shippingContent.php';
                    }elseif($pages=='paymentContent'){
                        include 'pages/paymentContent.php';
                    }elseif($pages=='categoryProductContent'){
                        include 'pages/categoryProductContent.php';
                    }elseif($pages=='success_message'){
                        include'pages/success_message_content.php';
                    }elseif($pages=='searchProduct'){
                        include'pages/searchProductContent.php';
                    }elseif($pages=='fetch'){
                        include'pages/fetchContent.php';
                    }elseif($pages=='loginContent'){
                        include'pages/loginContent.php';
                    }
                }else{
                    include'pages/home_content.php';
                }
        ?>
          <?php ?>
            <!-------------- Start sellers -------------->
            
            <!-------------- End sellers -------------->
            <div class="spacer30"></div><!-- Spacer -->
            <!-------------- Footer -------------->
            <div class="wrapper-footer clearfix">
            	<?php include'includes/footer_top.php';?>
                <?php include 'includes/footer_bottom.php';?>
            <!-------------- End footer -------------->
        </div>
        <!-------------- End wrapper main -------------->
    </div>
    <!-------------- End wrapper -------------->
    
    <!-------------- Java script -------------->
    <script src="assets/FrontEnd/js/jquery.js" type="text/javascript"></script>
    <script src="assets/FrontEnd/jquery-ui/jquery-ui.js" type="text/javascript"></script>
    <script src="assets/FrontEnd/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="assets/FrontEnd/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/FrontEnd/js/owl.carousel.js" type="text/javascript"></script>
    <script src="assets/FrontEnd/js/plugins.js" type="text/javascript"></script>
   
    <script src="assets/FrontEnd/js/main.js" type="text/javascript"></script>   
</body>

</html>
