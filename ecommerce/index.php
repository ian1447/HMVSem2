<?php
session_start();
include("functions/functions.php");
include("include/menubar.php");
require_once "includes/db.php";
if (isset($_GET['pro_id'])){
    array_push($_SESSION['cart'],$_GET['pro_id']);
}
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
            <div id="header">
                <p>HVM Online Shopping - Home</p>
            </div>
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
                        <?php if (!isset($_SESSION['user'])) { ?>
                            You are not logged in. Please <a href="login.php" style="color:yellow">Log In</a> to add to cart.
                        <?php } else {
                        ?>
                            Welcome <?php echo $_SESSION['user']; ?>! <b style="color:yellow">Shopping Cart -</b> Total items: <?php getCartTotalItems(); ?> Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
                        <?php } ?>
                    </span>
                </div>
                <div id="products_box">
                    <?php getPro(); ?>
                    <?php getCatPro(); ?>
                    <?php getBrandPro(); ?>
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