<?PHP
    ob_start();
    
    session_start();

    

if(!isset($_SESSION['email']))
{
    echo "<script>";
    echo "alert(login first!!);";
    echo "window.location.href='../User/index.php'";
    echo "</script>";
    //header("location:../Admin/Admin.php"); 
}
    
    include '../Database/db_connection.php';
    $result = mysqli_query($con, "select * from tbl_product_category");
    $res = mysqli_query($con, "select * from tbl_product");
    
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Online Grocery Shop Admin</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <form method="post" action="./add_product.php" id="f1" enctype="multipart/form-data">
            
            <div id="wrapper">
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="adjust-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="Admin.php">
                                <img src="assets/img/GSLogo3.jpg" />

                            </a>

                        </div>

                        <span class="logout-spn" >
                            <a href="adminlogout.php" style="color:#fff;">Logout</a>  

                        </span>
                    </div>
                </div>
                <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">



                            <li class="active-link">
                                <a href="add_product.php" ><i class="fa fa-desktop "></i>Add New Product</a>
                            </li>


                            <li>
                                <a href="add_category.php"><i class="fa fa-table "></i>Product Category</a>
                            </li>
                            
                            <li>
                                <a href="edit_product.php"><i class="fa fa-table "></i>Update/Delete Product</a>
                            </li>

                        </ul>
                    </div>

                </nav>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper" >
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>ADMIN DASHBOARD</h2>   
                            </div>
                        </div>              
                        <!-- /. ROW  -->
                        <hr />
                        <!-- /. ROW  --> 

                        <center>
                            <h3>ADD NEW PRODUCT</h3>
                            <table>
                                <tr>
                                    <td>Product Name:-</td>
                                    <td><input name="txt_pn" type="text" id="txt_pn" required/>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Description:-</td>
                                    <td><input name="txt_pd" type="text" id="txt_pd" required/>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Price:-</td>
                                    <td><input name="txt_pp" type="text" id="txt_pp" required/>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Quantity:-</td>
                                    <td><input name="txt_pqty" type="text" id="txt_pqty" required/>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Images:-</td>
                                    <td><input type="file" name="fu_pim" id="fu_pim" required />
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>

                                <tr>
                                    <td>Select Category:-</td>
                                    <td><select name="sc" id="sc" required>
                                            <option value="" >Select Category</option>
                                            <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                            ?>
                                            <option value="<?php echo $row["PRODUCT_CATEGORY_ID"]; ?>"><?php echo $row["PRODUCT_CATEGORY_NAME"]; ?></option>
                                            <?php 
                                                }
                                            ?>
                                         
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>

                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="btn_submit" value="SAVE"  id="c1_b1" />
                                        <br />
                                        <span id="c1_p_mess"></span>
                                    </td>
                                </tr>
                            </table> 
                            <br>
                            <br>
                            <br>
                            <table border="2">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>IMAGE</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <!--<th>Select Category</th>-->
                           
                            <th colspan="2">Action</th>
                        </tr>
                        <?php while($row= mysqli_fetch_object($res))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row->PRODUCT_NAME?></td>
                            <td><?php echo $row->PRODUCT_DESC?></td>
                            <td>
                                <img src="../Admin/product_img/<?php echo $row->PRODUCT_IMG; ?>" height="100" width="100" alt="" />
                            </td>
                            <td><?php echo $row->PRODUCT_PRICE?></td>
                            <td><?php echo $row->PRODUCT_QTY?></td>
                            
                            <td><a href="update_product.php?id=<?php echo $row->PRODUCT_ID ;?>">Edit</a></td>
                            <td><a href="delete_product.php?id=<?php echo $row->PRODUCT_ID ;?>" onclick="javascript:return confrim('Are You sure delete this record?');">Delete</a></td>
                        </tr>
                        <?php }?>
                    </table>    
                        </center>   

                        <!-- /. ROW  -->  
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <div class="footer">


                <div class="row">
                    <div class="col-lg-12" >
                        &copy;  2021 | Design by: <a style="color:#fff;" target="_blank">Abhi Shah & Naivil Patel</a>
                    </div>
                </div>
            </div>


            <!-- /. WRAPPER  -->
            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
            <!-- JQUERY SCRIPTS -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- BOOTSTRAP SCRIPTS -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- CUSTOM SCRIPTS -->
            <script src="assets/js/custom.js"></script>


            
        </form>   
    </body>
</html>

<?php
    
          
    
    if(isset($_REQUEST['btn_submit']))
    {
        $PRODUCT_NAME = $_REQUEST['txt_pn'];
        $PRODUCT_DESC = $_REQUEST['txt_pd'];
        $PRODUCT_PRICE= $_REQUEST['txt_pp'];
        $PRODUCT_QTY = $_REQUEST['txt_pqty'];
        $PRODUCT_IMG = $_REQUEST['fu_pim'];
        $PRODUCT_CATEGORY = $_REQUEST['sc'];
        
        
        $img_name = $_FILES["fu_pim"]["name"];
        $tmp_name = $_FILES["fu_pim"]["tmp_name"];
  
        
        move_uploaded_file($tmp_name, "product_img/$img_name");
  
        $result = "insert into tbl_product(PRODUCT_NAME , PRODUCT_DESC , PRODUCT_PRICE , PRODUCT_QTY , PRODUCT_IMG , PRODUCT_CATEGORY) values ('$PRODUCT_NAME' , '$PRODUCT_DESC' , '$PRODUCT_PRICE' , '$PRODUCT_QTY' , '$img_name' , '$PRODUCT_CATEGORY')";
        $res = mysqli_query($con, $result);
        
        if($res){
            //echo '<script>alert("Inserted");</script>';
            ?><script>alert("Inserted")</script><?php
        }
        else {
            ?><script>alert("Not Inserted")</script><?php
        }
        header('location:add_product.php');
    }

?>
<?php

ob_flush();

?>