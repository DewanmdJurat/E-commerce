<?php 
$query_result=$ms_obj_app->select_category_published_for_menu();
?>
<div class="navigation"><!-- Start navigation -->
            	<div class="container">
            		<nav class="main-nav">
                    	<div class="reponsive-menu">
                        	<a id="responsive-btn" href="#"><!-- Responsive nav button -->
                            	<span class="responsive-btn-icon">
                           			<span class="responsive-btn-block"></span>
                                  	<span class="responsive-btn-block"></span>
                                	<span class="responsive-btn-block last"></span>
                              	</span>
                          		<span class="responsive-btn-text">Menu</span>
                        	</a><!--End responsive nav button -->
                       		<div id="responsive-menu-container">
                                        
                      	</div><!-- End responsive menu container -->
                  	</div>
                	<ul class="menu clearfix">
                  		<li>
                          <a href="index.php">Home</a>
                        </li>
                        <?php while($show_category=mysqli_fetch_assoc($query_result)){?>
                        <li>
                       		<a href="productCategory.php?category_id=<?php  echo $show_category['category_id']; ?>"><?php echo $show_category['category_name']; ?></a>
                      	</li>
                       	<?php }?>
                      	</ul>
                 	</nav>
            	</div>
            </div>