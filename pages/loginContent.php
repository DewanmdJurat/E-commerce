<?php 
 
if(isset($_POST['login']) && $_POST['customerEmail']!=''&& $_POST['password']!='' ):
    $message=$ms_obj_app->customer_login_for_signin($_POST);  
endif;
if(isset($_POST['register']) && $_POST['firstName']!='' && $_POST['lastName']!=''&& $_POST['customerEmail']!=''&& $_POST['phoneNumber']!=''&& $_POST['city']!=''&& $_POST['district']!=''&& $_POST['address']!=''&& $_POST['password']!='' ):
    $result=$ms_obj_app->customer_register_info_for_signin($_POST);
    
    // echo "<pre>";
    // print_r($_POST);
    // exit();

endif;
?>
<div class="wrapper-breadcrumbs clearfix">
	<div class="container">
 	<div class="breadcrumbs-main clearfix">
    	<h3>You have to login to complete your valuable order.if you are not registered then please register first.</h3>
        
 	</div>
	</div>
</div>
<div class="wrapper-main brandshop clearfix">
	<div class="spacer30"></div><!--spacer-->
	<div class="container">
    	<div class="inner-block"><!------Main Inner-------->
        	<div class="row">
            	<div class="sign-main"><!-- Start Sign -->
                    <div class="sign-details clearfix"><!-- Start Form -->
                    	<div class="col-sm-6 contact-form">
                        	<div class="sign-block">
                            	<h4>Login</h4>
                            	<h5 style="color:red;"><?php if(isset($message)){echo $message;} ?></h5>
                                <form action="" method="post"  >
                                    <ul>
                                        <li class="form-group">
                                            <label for="email">Email Address <span>*</span></label>
                                            <input type="email" id="email" name="customerEmail" class="form-control" required />
                                        </li>
                                        <li class="form-group">
                                            <label for="pass">Password <span>*</span></label>
                                            <input type="text" id="pass" name="password" class="form-control" required/>
                                        </li>
                                        <li>
                                            <button name="login" type="submit" class=" btn btn-info btn-block">Login</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 contact-form">
                        	<div class="new-account">
                            	<div class="sign-block">
                                    <h4>Create new account</h4>
                            		<h4><?php if(isset($result)){ echo $result;} ?></h4>

                                <form action="" method="post" id="initialForm">
                                    <ul>
                                        <li class="form-group">
                                            <label for="name">First Name<span>*</span></label>
                                            <input type="text" id="name" class="form-control" name="firstName" required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="name">Last Name<span>*</span></label>
                                            <input type="text" id="name" class="form-control" name="lastName" required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="email-1">Email Address <span>*</span></label>
                                            <input type="email" id="email-1" class="form-control" name="customerEmail"required />
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">Phone Number<span>*</span></label>
                                            <input type="number" id="pn" class="form-control" name="phoneNumber" required />
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">City<span>*</span></label>
                                            <input type="text" id="pn" class="form-control" name="city"  required/>
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">District<span>*</span></label>
                                            <input type="text" id="pn" class="form-control" name="district" required />
                                        </li>
                                        <li class="form-group">
                                            <label for="pn">Address<span>*</span></label>
                                            <textarea type="text" id="pn" class="form-control" name="address" required> </textarea>
                                        </li>
                                        <li class="form-group">
                                            <label for="pass-1">Password <span>*</span></label>
                                            <input type="text" id="pass-1" class="form-control" name="password" required/>
                                        </li>
                                        <li>
                                             <button class=" btn btn-info btn-block" type="submit" name="register" >Register</button>
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
