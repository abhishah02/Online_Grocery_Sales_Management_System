

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
    
    $id = $_GET["id"];
    $query = "SELECT * FROM `tbl_product` where PRODUCT_ID='".$id."' ";
    $res = mysqli_query($con, $query);
    $categoryid =  "";
    $price = "";
            
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
       
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/ie6.css" rel="stylesheet" type="text/css" />

    <?php
        while($data = mysqli_fetch_assoc($res))
        {
             $categoryid = $data["PRODUCT_CATEGORY"];
             $price =  $data["PRODUCT_PRICE"];
             $qty_db = $data["PRODUCT_QTY"];       
    
    ?>
    

    <div style="height:382px; width:250px; float:left;border-style:solid; border-width:1px;">
        <img src="../Admin/product_img/<?php echo $data["PRODUCT_IMG"]; ?>" height="300" width="200" alt=""/>
         <h2>
            <b>
                Product Name=<?php echo $data["PRODUCT_NAME"] ?><br />
                Product Description=<?php echo $data["PRODUCT_DESC"] ?><br />
                Product Price=<?php echo $data["PRODUCT_PRICE"] ?><br />
                Product Quntity Available=<?php echo $data["PRODUCT_QTY"] ?>
            </b>
         </h2>
    </div>

    <?php
        }
    
    ?>
    
       
   

     
     
    <br/>
    <br/>
    <br/>
    <br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <table>
        <tr>
            <td><span id="c1_enq">Enter Quantity:-</span></td>
            <td><input name="qty1" type="text" id="c1_qty1" class="field" style="width:206px;" /></td>
            <td><input type="submit" name="b1" value="Add To Cart" id="c1_b1" class="search-submit" style="height:24px;width:80px;" /></td>
        </tr>
        <tr>
            <td colspan="3">
                <span id="c1_l1" style="color:Red;"></span>
            </td>
        </tr>
    </table>
    

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

</body>
</html>

<?php
    
        if(isset($_REQUEST['b1']))
        {

            $qty = $_REQUEST["qty1"];
            $add_card_price =  $qty * $price;
        
        
            if($qty_db >= $qty)
            {
         
            //echo "<script>alert('this is for testing')</script>"
                $qty_less = $qty_db - $qty;
                $q1 = "UPDATE tbl_product SET `PRODUCT_QTY`='".$qty_less."' WHERE `PRODUCT_ID`='".$id."'";
                $ex = mysqli_query($con,$q1);
                $q = "INSERT INTO `tbl_add_card`(`PRODUCT_ID`, `PRODUCT_CATEGORY_ID`, `PRODUCT_QTY`, `PRODUCT_PRICE`, `USER_ID`) VALUES ('".$id."','".$categoryid."','".$qty."','".$add_card_price."','".$USER_ID."')";
                $result = mysqli_query($con, $q);
            }else
            {
                echo "<script>alert('Enter Quentity Correct')</script>";
            }
        
        }
        
     

        // put your code here
        ob_flush();

?>

