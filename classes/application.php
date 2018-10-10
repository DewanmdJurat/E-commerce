<?php
class Application{
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
	public function select_category_published_for_menu(){
		$sql="SELECT * FROM tbl_category WHERE publication_status=1";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function show_product_summery(){
		$sql="SELECT p.product_id,p.product_name,p.product_price,i.* FROM tbl_product as p,tbl_product_image as i  WHERE i.product_id=p.product_id  AND publication_status=1 ORDER BY p.product_id DESC ";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			echo "Product Not found";
		}
	}
	/* Home pagination start*/
	public function select_for_pagination($pages){
		$sql="SELECT p.product_id,p.product_name,p.product_price,i.* FROM tbl_product as p,tbl_product_image as i  WHERE i.product_id=p.product_id  AND publication_status=1 ORDER BY p.product_id DESC LIMIT $pages,12 ";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	/*Home pagination start*/
	public function select_product_details_by_id($product_id){
		$sql="SELECT p.*,i.*,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_product_image as i,tbl_category as c,tbl_manufacturer as m WHERE  p.product_id=i.product_id AND p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$result_product=mysqli_query($this->db_connect,$sql);
			return $result_product;
		}else{
			header('Location:404.php');
		}
	}
	public function select_related_product_by_category_id($category_id)
	{
		$sql="SELECT p.product_id,p.product_name,p.product_price,i.*,c.category_id FROM tbl_product as p,tbl_product_image as i,tbl_category as c WHERE  i.product_id=p.product_id  AND p.product_id='$category_id' LIMIT 0,4";
		if(mysqli_query($this->db_connect,$sql)){
			$related_product=mysqli_query($this->db_connect,$sql);
			// echo "<pre>";
			// print_r($related_product);
			// exit();
			return $related_product;
		}else{
			echo "Product Not found";
		}
	}
	public function select_product_by_category_id(){
		$sql="SELECT p.product_id,p.product_name,p.product_price,i.*,c.category_id FROM tbl_product as p,tbl_product_image as i,tbl_category as c WHERE i.product_id=p.product_id  AND publication_status=1 AND p.product_id=c.category_id  ORDER BY p.product_id DESC";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			echo "Product Not found";
		}
	}
	public function select_published_product_by_category_id($category_id){
		$sql="SELECT p.*,i.* FROM tbl_product as p,tbl_product_image as i WHERE  i.product_id=p.product_id  AND publication_status=1 AND p.category_id='$category_id' ORDER by p.product_id DESC ";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			echo "Product Not found";
		}

	}
	public function select_published_product_by_category_id_for_pagination($pages,$category_id){
		$sql="SELECT p.*,i.* FROM tbl_product as p,tbl_product_image as i WHERE  i.product_id=p.product_id   AND publication_status=1 AND p.category_id='$category_id' ORDER by p.product_id DESC LIMIT $pages,2";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			echo "Product Not found";
		}

	}
	
	/*Cart start */
	public function add_to_cart($data){
		$product_id=$data['product_id'];
		$sql="SELECT  p.product_name,p.product_price,i.product_image FROM tbl_product as p,tbl_product_image as i WHERE i.product_id=p.product_id AND p.product_id='$product_id'";
		$query_result=mysqli_query($this->db_connect,$sql);
		$product_info=mysqli_fetch_assoc($query_result);
		session_start();
		$session_id=session_id();
		$sql="INSERT INTO tbl_temp_cart(session_id,product_id,product_name,product_price,product_quantity,product_image) VALUES('$session_id','$product_id','$product_info[product_name]','$product_info[product_price]','$data[product_quantity]','$product_info[product_image]')";
		mysqli_query($this->db_connect,$sql);
		header('Location:cart.php');
	}
	public function select_cart_item_by_session_id($session_id){
		$sql="SELECT * FROM tbl_temp_cart WHERE session_id='$session_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			echo "please add product";
		}
	}
	public function quantity_update_by_id($data){
		$quantity=$data['quantity'];
		if($quantity>=1){
			$sql="UPDATE tbl_temp_cart SET product_quantity='$quantity' WHERE temp_cart_id='$data[quantityId]'";
			if(mysqli_query($this->db_connect,$sql)){
			$message="product quentity Update Successfully";
			return $message;
		}else{
			die('Query Problem'.mysql_error($this->db_connect));
		}
		}else{
			$message="please input valid number of product quantity";
			return $message;
		}
		
	}
	public function delete_cart_product_by_temp_id($temp_cart_id){
		$sql="DELETE FROM tbl_temp_cart WHERE temp_cart_id='$temp_cart_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$message="Delete cart item successfully";
			return $message;
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	/* Cart End*/

	public function customer_registation_by_customer($data){

		$password=md5($data['password']);
		$sql="INSERT INTO tbl_customer(firstName,lastName,customerEmail,phoneNumber,city,district,address,password) VALUES('$data[firstName]','$data[lastName]','$data[customerEmail]','$data[phoneNumber]','$data[city]','$data[district]','$data[address]','$password')";
		if(mysqli_query($this->db_connect,$sql)){
			$customer_id=mysqli_insert_id($this->db_connect);
			session_start();
			$_SESSION['customer_id']=$customer_id;
			$_SESSION['fullName']=$data['firstName'].' '.$data['lastName'];
			header('Location:shipping.php');
		}else{
			$message="please enter your valid information";
			return $message;
		}
	}
	public function customer_login_info($data){
		$customerEmail=$data['customerEmail'];
		$password=md5($data['password']);
		$sql="SELECT * FROM tbl_customer WHERE customerEmail='$customerEmail' AND password='$password'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			$customer_info=mysqli_fetch_assoc($query_result);
			if($customer_info){
				$_SESSION['customer_id']=$customer_info['customer_id'];
				$_SESSION['fullName']=$customer_info['firstName'].' '.$customer_info['lastName'];
				header('Location:shipping.php');
			}else{
				$message="Your email address or password invalid";
				return $message;
			}
		}
	}
	public function customer_register_info_for_signin($data)
	{	$password=md5($data['password']);
		$sql="INSERT INTO tbl_customer(firstName,lastName,customerEmail,phoneNumber,city,district,address,password) VALUES('$data[firstName]','$data[lastName]','$data[customerEmail]','$data[phoneNumber]','$data[city]','$data[district]','$data[address]','$password')";
		if(mysqli_query($this->db_connect,$sql)){
			$customer_id=mysqli_insert_id($this->db_connect);
			session_start();
			$_SESSION['customer_id']=$customer_id;
			$_SESSION['fullName']=$data['firstName'].' '.$data['lastName'];
			header('Location:index.php');
		}else{
			$result="Please Fill Your Information";
			return $result;
		}
	}
	public function customer_login_for_signin($data)
	{
		// echo "<pre>";
		// print_r($data);
		// exit();
		$customerEmail=$data['customerEmail'];
		$password=md5($data['password']);
		$sql="SELECT * FROM tbl_customer WHERE customerEmail='$customerEmail' AND password='$password'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			$customer_info=mysqli_fetch_assoc($query_result);
			if($customer_info!=NULL):
				$_SESSION['customer_id']=$customer_info['customer_id'];
				$_SESSION['fullName']=$customer_info['firstName'].' '.$customer_info['lastName'];
				header('Location:index.php');
			else:
				$message="Your email address or password invalid";
				return $message;
			endif;
		}
	}
	public function select_customer_info_by_id($customer_id){
		$sql="SELECT * FROM tbl_customer WHERE customer_id='$customer_id'";
		if(mysqli_query($this->db_connect,$sql)){
			$query_result=mysqli_query($this->db_connect,$sql);
			return $query_result;
		}else{
			header('Location:chekcout.php');
		}
	}
	public function shipping_info_save($data){
		$sql="INSERT INTO tbl_shipping(fullName,customerEmail,phoneNumber,city,district,address) VALUES('$data[fullName]','$data[customerEmail]','$data[phoneNumber]','$data[city]','$data[district]','$data[address]') ";
		if(mysqli_query($this->db_connect,$sql)){
			$shipping_id=mysqli_insert_id($this->db_connect);
			session_start();
			$_SESSION['shipping_id']=$shipping_id;
			header('Location:payment.php');
		}else{
			die('Query Problem'.mysqli_error($this->db_connect));
		}
	}
	public function save_payment_info_by_customer($data){
		$payment_type=$data['payment_type'];
		if($payment_type=='cash_ondelivery'){
			$customer_id=$_SESSION['customer_id'];
			$shipping_id=$_SESSION['shipping_id'];
			$order_total=$_SESSION['order_total'];
			$sql="INSERT INTO tbl_order(customer_id,shipping_id,order_total) VALUES('$customer_id','$shipping_id','$order_total')";
			if(mysqli_query($this->db_connect,$sql)){
				$order_id=mysqli_insert_id($this->db_connect);
				$sql="INSERT INTO tbl_payment(order_id,payment_type) VALUES('$order_id','$payment_type')";
				if(mysqli_query($this->db_connect,$sql)){
					$session_id=session_id();
					$sql="SELECT * FROM tbl_temp_cart WHERE session_id='$session_id'";
					$query_result=mysqli_query($this->db_connect,$sql);
					while($product_info=mysqli_fetch_assoc($query_result)){
						$sql="INSERT INTO tbl_order_details(order_id,product_id,product_name,product_price,product_quantity,product_image) VALUES('$order_id','$product_info[product_id]','$product_info[product_name]','$product_info[product_price]','$product_info[product_quantity]','$product_info[product_image]')";
						mysqli_query($this->db_connect,$sql);
					}
					$sql="DELETE FROM tbl_temp_cart WHERE session_id='$session_id'";
					mysqli_query($this->db_connect,$sql);
					$_SESSION['message']="Your order is Successfully Placed.";
					header('Location:success_message.php');
				}else{

				}
			}else{

			}
		}elseif($payment_type=='paypal'){
			echo "<p class='text-center text-info'>Paypal is painding .please Chose Cash On Delevery</p>";
		}elseif($payment_type=='bkash'){
			echo "<p class='text-center text-info'>Bkash is painding .please Chose Cash On Delevery</p>";
		}
	}

	public function count_temp_product_by_session_id(){
		$session_id=session_id();
		$sql="SELECT * FROM tbl_temp_cart";
		$query_result=mysqli_query($this->db_connect,$sql);
		return $query_result;
	}
	// public function pagination(){
	// 	$pagination_buttons=11;
	// 	$page_number=(isset($_GET['page'])&& !empty($_GET['page']))?$_GET['page']:1;
	// 	$per_page_records=10;
	// 	$rows=100;
	// 	$last_page=ceil($rows/$per_page_records);
	// 	$pagination='';
	// }
	
	public function validation($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	public function logout_customer(){
		unset($_SESSION['customer_id']);
		unset($_SESSION['fullName']);
		header('Location:index.php');
	}
	/* search */

public function select_search_result($search){
	$validate=htmlspecialchars($search);
	$validate=mysqli_real_escape_string($this->db_connect,$search);
	$sql="SELECT p.*,i.* FROM tbl_product as p,tbl_product_image as i WHERE  p.product_name LIKE '%$search%' AND i.product_id=p.product_id AND publication_status=1 ORDER BY p.product_id DESC LIMIT 12";
	if(mysqli_query($this->db_connect,$sql)){
		$result=mysqli_query($this->db_connect,$sql);
		return $result;
	}else{
		die('Query Problem'.mysqli_error($this->db_connect));
	}
}

/* search */
}


