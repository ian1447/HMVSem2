<?php
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
    <div class="main_wrapper">
        <div class="header_wrapper">

            <img id="logo" src=" images/logo.gif" width="10%" height="100" />
            <img id="banner" src="images/ad_banner.jpg" width="90%" height="100" />

            <div></div>
        </div>

        <div class="content_wrapper">
            <!-- sidebar -->
            <div id="sidebar">
                <div>Categories</div>
                <?php getCats(); ?>
                <div>Brands</div>
                <?php getBrands(); ?>

            </div>
            <!-- end of sidebar -->
            <!-- header -->
            <div id="header"> This is header</div>
            <!-- header end -->
            <!-- menubar -->
            <div id="menubar">
                <?php GetMenubar(); ?>
            </div>
            <!-- end of menubar -->
            <!-- content area -->
            <div id="content_area">
                <div id="shopping_cart">
                    <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
                        Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
                    </span>
                </div>
                <div id="products_box">
                    <?php
                    if (isset($_GET['pro_id'])) {
                        $product_id = $_GET['pro_id'];
                    }
                    $get_pro = "select * from product where product_id='$product_id'";
                    $run_pro = mysqli_query($con, $get_pro);
                    while ($row_pro = mysqli_fetch_array($run_pro)) {
                        $pro_id = $row_pro['Product_id'];
                        $pro_cat = $row_pro['Product_cat'];
                        $pro_brand = $row_pro['Product_brand'];
                        $pro_title = $row_pro['Product_title'];
                        $pro_price = $row_pro['Product_price'];
                        $pro_image = $row_pro['Product_image'];
                        $pro_desc = $row_pro['Product_desc'];
                        echo "
                            <div id='single_product'>
                                <h3>$pro_title</h3>
                                <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                                <p><b> $ $pro_price</b></p>
                                <p>$pro_desc</p>  
                                <a href='index.php' style='float:left;'>Go Back</a>
                                <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</b>
                            </div>
                        ";
                    }
                    ?>
                </div>

            </div>
            <!-- end of content area -->
        </div>
        <div id="footer">
            <h2 style="text-align:center; padding-top:30px;">&copy; 2016 by The Webmaster</h2>
        </div>


    </div>
</body>

</html>