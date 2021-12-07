<?php
        //ob_start();
        //session_start();
        $USER_ID = $_SESSION['user_id'];
        include '../Database/db_connection.php';

        $query = "SELECT * FROM `tbl_add_card` WHERE `USER_ID`='" . $USER_ID . "'";
        $res = mysqli_query($con, $query);
        $price = "";
        $sum = 0;
        $count = 0;
        while ($data = mysqli_fetch_array($res)) {
            $price = $data["PRODUCT_PRICE"];
            $sum += $price;
            ?>
         
       
  
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
    <link rel="stylesheet" href="csss/style.css" type="text/css" media="all" />
    <title>Online Grocery Shop</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    
</head>

    <body>
        
        
        
  <!-- Header -->
  <div id="header">
      <h1 id="logo"><a href="home.php">Online Grocery Shop</a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="view_cart.php" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      <span>Total Items:<span id="counttoitem"><?php echo $count; ?></span></span> &nbsp;&nbsp; <span>Cost:<span id="counttoprice"><?php echo $sum; ?></span></span> </div>
  <?php 
        $count+=1;
       } 
?>
      <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="display_all_product.php">The Store</a></li>
       
         <?php
            if(!empty($_SESSION['emailId'])){
                ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                    
                 <?php
                 
            }
            else{
                ?>
                    <li><a href="index.php">Sign in</a></li>   
                    <li><a href="registration.php">Sign Up</a></li>
                    
                 <?php
            }
        ?>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
        <?php
        
        ?>
    </body>
</html>
