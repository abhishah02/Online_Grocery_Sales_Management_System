<?php

    ob_start();
    
    session_start();
    
    $USER_ID = $_SESSION['user_id'];
    if(!isset($_SESSION['emailID']))
    {
        echo "<script>";
        echo "alert(login first!!);";
        echo "window.location.href='../User/index.php'";
        echo "</script>";
    //header("location:../Admin/Admin.php"); 
    }
    
    include '../Database/db_connection.php';
    
    $query = "SELECT * FROM `tbl_add_card` WHERE `USER_ID`='".$USER_ID."'";
    $res = mysqli_query($con, $query);
    $ADD_TO_CART_ID="";
    $product_id="";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<title>Online Grocery Shop</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

</head>
<body>
<form method="post" id="f1">



<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <?php
    include './header.php';
  ?>
  <!-- End Header -->
  <!-- Main -->
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <div id="content">
      <!-- Products -->
      <div class="products">
       <!--This is Content Area -->
       
<table id="c1_d1" cellspacing="0" style="border-collapse:collapse;">
	<tr>
		<td>
    <table border="2">
        <tr style="background-color:Fuchsia ; color:White; font-weight:bold;">
            <td>IMAGE</td>
            <td>NAME</td>
            <td>DESCRIPTION</td>
            <td>PRICE</td>
            <td>QUANTITY</td>
            <td>DELETE PRODUCT</td>
        </tr>
    </td>
	</tr><tr>
		<td>
    <center>
        
        <?php
        while($data = mysqli_fetch_assoc($res))
        {
                $product_id = $data["PRODUCT_ID"];
                $ADD_TO_CART_ID=$data['ADD_TO_CART_ID'];
                $add_to_card_qty=$data['PRODUCT_QTY'];
                $price=$data['PRODUCT_PRICE'];
                $q = "SELECT * FROM `tbl_product` WHERE PRODUCT_ID='".$product_id."'";
                $rs = mysqli_query($con, $q);
                //echo $product_id;
        while($data_1 = mysqli_fetch_array($rs))
        {
            
        ?>
        <tr>
            <td>
                <img src="../Admin/product_img/<?php echo $data_1["PRODUCT_IMG"]; ?>" height="100" width="100" alt="" />
            </td>
            <td>
                <?php echo $data_1["PRODUCT_NAME"] ?>
            </td>
            <td>
                <?php echo $data_1["PRODUCT_DESC"] ?> 
            </td>
            <td>
                <?php echo $add_to_card_qty; ?>
            </td>
            <td>
                <?php echo $price; ?>
            </td>
             <td>
                 <a href="delete_view_cart.php?id=<?php echo $data['ADD_TO_CART_ID'];?>">Delete</a>
            </td>
        </tr>
        <?php
        }
        }
        ?>
        </center>
    </td>
	</tr><tr>
		<td>
    </table>
    </td>
	</tr>
</table>
<br />
<p align="center" style="font-weight:bold;">
<span id="c1_mess">TOTAL AMOUNT TO PAY:-<?php ?></span><br/>
<input type="submit" name="btn_checkout" value="Checkout" id="c1_btn_checkout" />
</p>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Categories -->
        <?php
          include './display_category.php';
        ?>
      <!-- End Categories -->
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
  
    <?php
            include './footer.php';
    ?>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</form>
    
<?php
    
?>

</body>
</html>