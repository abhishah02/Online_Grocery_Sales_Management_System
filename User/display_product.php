


<?PHP
                                    ob_start();
                                    
                                    session_start();

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
                                    $q = "SELECT * FROM `tbl_product` WHERE PRODUCT_CATEGORY='".$id."'";
                                    $result = mysqli_query($con,$q);
                                    
                                   
?>
                                                        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <title>Online Grocery Shop</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        
    </head>
    <body>
        <form method="post" action="./display_product.aspx" id="f1">
            
            
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


                                                    <ul>

                                                        <?php
                                                        
                                                               while($data = mysqli_fetch_assoc($result))
                                                                {
                                                                   
                                                         ?>
                                                           
                                                        <li class="last">
                                                            <a href="product_desc.php?id=<?php echo $data["PRODUCT_ID"]; ?>"><img src="../Admin/product_img/<?php echo $data["PRODUCT_IMG"]; ?>" alt="" /></a>
                                                            <div class="product-info">
                                                                <h3><?php echo $data["PRODUCT_NAME"] ?></h3>
                                                                <div class="product-desc">
                                                                    <h4>STOCK :<?php echo $data["PRODUCT_QTY"] ?></h4>
                                                                    <p>DESC :<?php echo $data["PRODUCT_DESC"] ?></p>
                                                                    <strong class="price">PRICE :<?php echo $data["PRODUCT_PRICE"] ?></strong> </div>
                                                            </div>
                                                        </li>

                                                                <?php
                                                                     }   
                                                        
                                                        ?>
                                      

                                                    </ul>


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
</div>
</div>      
</form>
</body>                                                                                                                        
</html>


