<?php 
$query_result=$ms_obj_app->select_category_published_for_menu();
?>
            <div class="container">
                    <div class="f-categories clearfix">
                        <div class="col-sm-12">
                            <h4>Product Manufacturer</h4>
                            <ul>
                                 <?php while($show_category=mysqli_fetch_assoc($query_result)){?>
                                <li><a href="<?php echo $show_category['category_id']; ?>"><?php echo $show_category['category_name']; ?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>