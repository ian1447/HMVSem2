<?php
$con = mysqli_connect("192.168.13.72", "system_admin", "Opn49fD23", "ecommerce");
//getting the categories
function getCats()
{
	global $con;
	$get_cats = "select * from category";
	$run_cats = mysqli_query($con, $get_cats);
	while ($row_cats = mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}
function getBrands()
{
	global $con;
	$get_brands = "select * from brands";
	$run_brands = mysqli_query($con, $get_brands);
	while ($row_brans = mysqli_fetch_array($run_brands)) {
		$brand_id = $row_brans['brand_id'];
		$brand_title = $row_brans['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

function getPro()
{
	// if (isset($_GET['pro_id'])) {
	// 	$_SESSION['product_arr'][0] = $_GET['pro_id'];
	// 	echo $_SESSION['product_arr'][0];
	// }

	if (!isset($_GET['cat'])) {
		if (!isset($_GET['brand'])) {
			global $con;
			$get_pro = "select * from product order by RAND() LIMIT 0,6";
			$run_pro = mysqli_query($con, $get_pro);
			while ($row_pro = mysqli_fetch_array($run_pro)) {
				$pro_id = $row_pro['Product_id'];
				$pro_cat = $row_pro['Product_cat'];
				$pro_brand = $row_pro['Product_brand'];
				$pro_title = $row_pro['Product_title'];
				$pro_price = $row_pro['Product_price'];
				$pro_image = $row_pro['Product_image'];
				//$pro_price = money_format($pro_price,2);

				echo "
		<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180' />
		<p><b>$  $pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>  
		<a href='index.php?pro_id=$pro_id '><button style='float:right'>Add to Cart</button></a>
		</div>
		";
			}
		}
	}
}

function getCatPro()
{

	if (isset($_GET['cat'])) {
		$cat_id = $_GET['cat'];
		global $con;
		$get_pro = "select * from product order by RAND() LIMIT 0.6";
		$get_cat_pro = "select * from product where product_cat='$cat_id'";
		$run_cat_pro = mysqli_query($con, $get_cat_pro);
		$count_cats = mysqli_num_rows($run_cat_pro);
		if ($count_cats == 0) {
			echo "<h2 style='padding:20px;'>There is no product in this category!</h2>";
		}

		while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
			$pro_id = $row_cat_pro['Product_id'];
			$pro_cat = $row_cat_pro['Product_cat'];
			$pro_brand = $row_cat_pro['Product_brand'];
			$pro_title = $row_cat_pro['Product_title'];
			$pro_price = $row_cat_pro['Product_price'];
			$pro_image = $row_cat_pro['Product_image'];


			echo "
	<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>

		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b> $ $pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
		<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</b>
	</div>
";
		}
	}
}

function getBrandPro()
{
	if (isset($_GET['brand'])) {
		$brand_id = $_GET['brand'];
		global $con;
		$get_pro = "select * from product order by RAND() LIMIT 0.6";
		$get_brand_pro = "select * from product where product_brand='$brand_id'";
		$run_brand_pro = mysqli_query($con, $get_brand_pro);
		$count_brands = mysqli_num_rows($run_brand_pro);
		if ($count_brands == 0) {
			echo "<h2 style='padding:20px;'>There is no product in this brand!</h2>";
		}
		while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
			$pro_id = $row_brand_pro['Product_id'];
			$pro_cat = $row_brand_pro['Product_cat'];
			$pro_brand = $row_brand_pro['Product_brand'];
			$pro_title = $row_brand_pro['Product_title'];
			$pro_price = $row_brand_pro['Product_price'];
			$pro_image = $row_brand_pro['Product_image'];


			echo "
	<div id='single_product'>
		<h3>$pro_title</h3>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
		<p><b> $ $pro_price</b></p>
		<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
		<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</b>
	</div>
";
		}
	}
}

function getCartTotalItems()
{
	if (count($_SESSION['cart']) > 0) {
		echo count($_SESSION['cart']);
	} else {
		echo 0;
	}
}

function getCartItems()
{
	global $con;
	if (count($_SESSION['cart']) > 0) {
		foreach ($_SESSION['cart'] as $var) {
			$get_cart_product = "select * from product where Product_id=$var";
			$run_cart_product = mysqli_query($con, $get_cart_product);
			$cart_product = mysqli_fetch_array($run_cart_product);
			$title = $cart_product['Product_title'];
			echo "<td>{$title}</td>
			<td>₱ {$cart_product['Product_price']}</td>
			<td>1</td>";
		}
	}
}

function clearCart()
{
	if (isset($_POST['clear'])) {
		$_SESSION['cart'] = [];
		header("Location: cart.php");
	}
}
