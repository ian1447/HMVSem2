<?php
session_start();
include("functions/functions.php");
include("include/menubar.php");
require_once "includes/db.php";
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
                <div id="table_div">
                    <label>
                        <p style="padding-left: 70vh; font-size:5vh; padding-bottom: 3vh;">My Shopping Cart</p>
                    </label>
                    <table>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                        </tr>
                        <tr>
                            <?php getCartItems() ?>
                        </tr>
                    </table>
                    <form method="POST">
                        <button name="clear" id="clear_button" type="submit" value="clear">Clear Cart</button>
                    </form>
                    <?php 
                        clearCart();
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