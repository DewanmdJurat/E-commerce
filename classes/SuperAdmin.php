<?php 
class SuperAdmin{

	private $db_connect;

	public function __construct(){
		$db_host='localhost';
		$db_user='root';
		$db_pass='';
		$db_name='dbmobileshop';
		$this->db_connect=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		if(!$this->db_connect){
			die('Connect fail'.mysqli_error($this->db_connect));
		}
	}
	/*category code start */
	public function save_category_info($data){
		
		$sql="INSERT INTO tbl_category(category_name,category_description,publication_status) VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Category Created Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	
	public function select_all_category_info(){
		$sql="SELECT * FROM tbl_category ORDER BY category_id DESC";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function unpublished_categroy_info($category_id){
		$sql="UPDATE tbl_category SET publication_status=0 WHERE category_id='$category_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Category Unpublished Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function published_categroy_info($category_id){
		$sql="UPDATE tbl_category SET publication_status=1 WHERE category_id='$category_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Category Published Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_category_by_id($category_id){
		$sql="SELECT * FROM tbl_category WHERE category_id='$category_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function update_category_info_by_id($data){
		$sql="UPDATE tbl_category SET category_name='$data[category_name]',category_description='$data[category_description]',publication_status='$data[publication_status]' WHERE category_id='$data[categoryId]'";
		if(mysqli_query($this->db_connect,$sql)){
			$_SESSION['message']="Category Updated Successfully";
			header('Location:manageCategory.php');
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function delete_categroy_info($category_id){
		$sql="DELETE FROM tbl_category WHERE category_id='$category_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Category Deleted Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	/* category code end */
	/* Manufacturer code start */
	public function save_manufacturer_info($data){
		$sql="INSERT INTO tbl_manufacturer(manufacturer_name,manufacturer_description,publication_status) VALUES('$data[manufacturer_name]','$data[manufacturer_description]','$data[publication_status]')";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Manufacturer Created Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_all_manufacturer_info(){
		$sql="SELECT * FROM tbl_manufacturer ORDER BY manufacturer_id DESC";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	
	public function unpublished_manufacturer_info($manufacturer_id){
		$sql="UPDATE tbl_manufacturer SET publication_status=0 WHERE manufacturer_id='$manufacturer_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Manufacturer Unpublished Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function published_manufacturer_info($manufacturer_id){
		$sql="UPDATE tbl_manufacturer SET publication_status=1 WHERE manufacturer_id='$manufacturer_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Manufacturer Published Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_manufacturer_by_id($manufacturer_id){
		$sql="SELECT * FROM tbl_manufacturer WHERE manufacturer_id='$manufacturer_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function update_manufacturer_info_by_id($data){
		$sql="UPDATE tbl_manufacturer SET manufacturer_name='$data[manufacturer_name]',manufacturer_description='$data[manufacturer_description]',publication_status='$data[publication_status]' WHERE manufacturer_id='$data[manufacturerId]'";
		if(mysqli_query($this->db_connect,$sql)){
			$_SESSION['message']="Manufacturer Updated Successfully";
			header('Location:manageManufacturer.php');
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function delete_manufacturer_info($manufacturer_id){
		$sql="DELETE FROM tbl_manufacturer WHERE manufacturer_id='$manufacturer_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Manufacturer Deleted Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}

	/* Manufacturer code end */
	/* product code start */
	public function select_published_category_info(){
		$sql="SELECT * FROM tbl_category WHERE publication_status=1";
		if(mysqli_query($this->db_connect,$sql)){
			$result_category=mysqli_query($this->db_connect,$sql);
			return $result_category;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_published_manufacturer_info(){
		$sql="SELECT * FROM tbl_manufacturer WHERE publication_status=1";
		if(mysqli_query($this->db_connect,$sql)){
			$result_manufacturer=mysqli_query($this->db_connect,$sql);
			return $result_manufacturer;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function save_product_info($data){
		$sql="INSERT INTO tbl_product(product_name,category_id,manufacturer_id,product_price,stock_amount,minimum_stock_amount,product_short_description,product_long_description,publication_status) VALUES('$data[product_name]','$data[category_id]','$data[manufacturer_id]','$data[product_price]','$data[stock_amount]','$data[minimum_stock_amount]','$data[product_short_description]','$data[product_long_description]','$data[publication_status]')";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Product Created Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_all_product_info(){
		$sql="SELECT p.product_id,p.product_name,p.product_price,p.stock_amount,p.publication_status,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_category as c,tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id ";
		if(mysqli_query($this->db_connect,$sql)){
			$result_product=mysqli_query($this->db_connect,$sql);
			return $result_product;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_product_details_for_show_details($product_id){
		$sql="SELECT p.*,i.*,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_product_image as i,tbl_category as c,tbl_manufacturer as m WHERE  p.product_id=i.product_id AND p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$result_product=mysqli_query($this->db_connect,$sql);
			return $result_product;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_product_by_id_for_edit($product_id){
		$sql="SELECT p.*,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_category as c,tbl_manufacturer as m where p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$result_product=mysqli_query($this->db_connect,$sql);
			return $result_product;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function update_product_details_by_id($data){
		$sql="UPDATE tbl_product SET product_name='$data[product_name]',category_id='$data[category_id]',manufacturer_id='$data[manufacturer_id]',product_price='$data[product_price]',stock_amount='$data[stock_amount]',minimum_stock_amount='$data[minimum_stock_amount]',product_short_description='$data[product_short_description]',product_long_description='$data[product_long_description]',publication_status='$data[publication_status]' WHERE product_id='$data[productId]'";
		if(mysqli_query($this->db_connect,$sql)){
			$_SESSION['message']="Product Info Update Successfully";
			header('Location:manageProduct.php');
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function unpublished_product_by_id($product_id){
		$sql="UPDATE tbl_product SET publication_status=0 WHERE product_id='$product_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Product Unpublished Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function published_product_by_id($product_id){
		$sql="UPDATE tbl_product SET publication_status=1 WHERE product_id='$product_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Product Published Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function delete_product_by_id($product_id){
		$sql="DELETE  FROM tbl_product WHERE product_id='$product_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$sql="SELECT * FROM tbl_product_image WHERE product_id='$product_id'";
			$sql="DELETE FROM tbl_product_image WHERE product_id='$product_id'";
			mysqli_query($this->db_connect,$sql);
			$message="Product Deleted Successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}

	/* product code end */

	/* product image start */
	public function select_product_name_for_image(){
		$sql="SELECT product_id,product_name FROM tbl_product";
		if(mysqli_query($this->db_connect,$sql)){
			$result=mysqli_query($this->db_connect,$sql);
			return $result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function save_image_by_product_id($data){
	$directory='images/';
	$target_file=$directory.$_FILES['product_image']['name'];
	$file_type=pathinfo($target_file,PATHINFO_EXTENSION);
	$file_size=$_FILES['product_image']['size'];
	$image=getimagesize($_FILES['product_image']['tmp_name']);

	if($image){
		if(file_exists($target_file)){
			$message="This image already exist";
			return $message;
		}else{
			if($file_size>5242880){
				echo "File size is too large";
			}else{
				if($file_type!='jpg'&&$file_type!=='png'){
					die('File type is not valide');
				}else{
					$sql="INSERT INTO tbl_product_image(product_id,product_image) VALUES('$data[product_id]','$target_file') ";
						if(mysqli_query($this->db_connect,$sql)){
						move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
							$message="Product impage inserted Successfully";
							return $message;
						}else{
							die('Query Problem'.mysqli_error($this->db_connect));
						}
					}
				}
			}
		}else{
			$message="This upload file Not an image.Please uplodad image file";
			return $message;
		}
	
	}
	public function select_all_product_image(){
		$sql="SELECT i.*, p.product_id,p.product_name FROM tbl_product_image as i , tbl_product as p  WHERE i.product_id=p.product_id ORDER BY i.product_id DESC ";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function select_image_by_id($image_id){
		$sql="SELECT * FROM tbl_product_image WHERE image_id='$image_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function update_product_image_by_id($data){
		$new_image=$_FILES['product_image']['name'];
		if($new_image){
			$sql="SELECT * FROM tbl_product_image WHERE image_id='$data[image_id]'";
			$query_reslut=mysqli_query($this->db_connect,$sql);
			$row=mysqli_fetch_assoc($query_reslut);
			unlink($row['product_image']);
			$directory='images/';
			$target_file=$directory.$_FILES['product_image']['name'];
			
			$file_type=pathinfo($target_file,PATHINFO_EXTENSION);
			$file_size=$_FILES['product_image']['size'];
			$image=getimagesize($_FILES['product_image']['tmp_name']);
			
			if($image){
				if(file_exists($target_file)){
					$message="This image already exist";
					return $message;
				}else{
					if($file_size>5242880){
						echo "File size is too large";
					}else{
						if($file_type!='jpg' && $file_type!='png'){
							die('File type is not valide');
						}else{
							
							$sql="UPDATE tbl_product_image SET product_id='$data[product_id]',product_image='$target_file' WHERE image_id='$data[image_id]'";
								if(mysqli_query($this->db_connect,$sql)){
								move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
								
									$_SESSION['message']="Update Successfully";
									header('Location:manageProductImage.php');
								}else{
									die('Query Problem'.mysqli_error($this->db_connect));
								}
							}
						}
					}
				}else{
					$message="This upload file Not an image.Please uplodad image file";
					return $message;
				}
		}else{
			$sql="UPDATE  tbl_product_image SET product_id='$data[product_id]' WHERE image_id='$data[image_id]'";
				if(mysqli_query($this->db_connect,$sql)){
				$_SESSION['message']="Info Update Successfully";
				header('Location:manageProductImage.php');
			}else{
			$message="Please  set Correct Info";
			return $message;
			}
		}
	}
/* product image end */
/* Order*/
public function order_summery(){

	$sql="SELECT O.*,C.firstName,C.lastName,P.payment_type,P.payment_status FROM tbl_order as O ,tbl_customer as C , tbl_payment as P WHERE O.customer_id=C.customer_id AND O.order_id=P.order_id   ORDER By O.order_id DESC";
	if(mysqli_query($this->db_connect,$sql)){
		$order_result=mysqli_query($this->db_connect,$sql);
		return $order_result;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}

public function select_customer_info_by_order_id($order_id){
	$sql="SELECT o.order_id,c.* FROM tbl_order as o,tbl_customer as c WHERE o.customer_id=c.customer_id  AND o.order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)){
		$customer_result=mysqli_query($this->db_connect,$sql);
		return $customer_result;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}
public function select_shipping_info_by_order_id($order_id){
	$sql="SELECT o.order_id,s.* FROM tbl_order as o,tbl_shipping as s WHERE o.shipping_id=s.shipping_id  AND o.order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)){
		$shipping_info=mysqli_query($this->db_connect,$sql);
		return $shipping_info;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}
public function select_payment_info_by_order_id($order_id){
	$sql="SELECT o.order_id,p.payment_type,p.payment_status FROM tbl_order as o,tbl_payment as p WHERE p.payment_id=o.order_id  AND o.order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)){
		$payment_info=mysqli_query($this->db_connect,$sql);
		return $payment_info;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}
public function select_product_info_by_order_id($order_id){
	$sql="SELECT o.order_id,d.* FROM tbl_order as o,tbl_order_details as d WHERE d.order_details_id=o.order_id  AND o.order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)){
		$payment_info=mysqli_query($this->db_connect,$sql);
		return $payment_info;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}
public function order_complete_update_by_order_id($order_id)
{
	$sql="UPDATE tbl_order SET  order_status='complete' WHERE order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)){
		$message="Order Status update Successfully";
		return $message;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}
public function order_pending_update_by_order_id($order_id)
{	
	$sql="UPDATE tbl_order SET order_status='pending' WHERE order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)):
		$message="Order Status update Successfully";
		return $message;
	else:
		die('Query Problem'.mysqli_error($this->db_connect));
	endif;
}
public function order_cancle_by_order_id($order_id)
{	
	$sql="UPDATE tbl_order SET order_status='canlce' WHERE order_id='$order_id'";
	if(mysqli_query($this->db_connect,$sql)):
		$message="Order Status update Successfully";
		return $message;
	else:
		die('Query Problem'.mysqli_error($this->db_connect));
	endif;
}
/* Order*/

/* Admin Home view summery */
public function total_product_has(){
	$sql="SELECT * FROM tbl_product";
	$total_product=mysqli_query($this->db_connect,$sql);
	return $total_product;
}
public function total_order(){
	$sql="SELECT * FROM tbl_order";
	$total_order=mysqli_query($this->db_connect,$sql);
	return $total_order;
}
public function total_customer(){
	$sql="SELECT * FROM tbl_customer";
	$total_customer=mysqli_query($this->db_connect,$sql);
	return $total_customer;
}
/* Admin Home view summery */
}