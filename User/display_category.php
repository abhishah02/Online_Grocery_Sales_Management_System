<?php
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
    
    $query = "SELECT * FROM `tbl_product_category`";
    $res = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <title>Online Grocery Shop</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    
</head>

    <body>
        <!-- Categories -->
        <div class="box categories">
            <h2>Categories <span></span></h2>
            <div class="box-content">
                <ul>
                <table id="pc" cellspacing="0" style="border-collapse:collapse;">
                <?php
                    while($row = mysqli_fetch_object($res))
                    {
                                                                
                ?>
                <tr>
                    <td>
                        <li><a href="display_product.php?id=<?php echo $row ->PRODUCT_CATEGORY_ID?>"><?php echo $row ->PRODUCT_CATEGORY_NAME?></a></li>    
                    </td>
                </tr>
                <?php
                    }
                ?>
                </table>

                </ul>
            </div>
        </div>
        <!-- End Categories -->
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>


<?php
        // put your code here
        
        ob_flush();

?>
