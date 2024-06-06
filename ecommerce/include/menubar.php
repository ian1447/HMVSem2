<?php
function GetMenubar()
{
    if (isset($_SESSION["user"])) {
        echo '<ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="allproducts.php">All Products</a></li>
        <li><a href="#">My Account</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a href="cart.php">Shopping Cart</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="functions/logout.php">Logout</a></li>
    </ul>

    <div id="form">
        <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a Product" />
            <input type="submit" name="search" value="search" />
        </form>
    </div>';
    } else {
        echo '<ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="allproducts.php">All Products</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Shopping Cart</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    
        <div id="form">
            <form method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Search a Product" />
                <input type="submit" name="search" value="search" />
            </form>
        </div>';
    }
}
