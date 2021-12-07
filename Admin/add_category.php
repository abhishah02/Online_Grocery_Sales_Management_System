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
    $query = "select * from tbl_product_category";
    $res = mysqli_query($con, $query);

  ?>

   <?php
                           
                        // $categories = "SELECT * FROM `tbl_product_category`";
                          
                          //$data = mysqli_query($con, $categories)
                           
                           echo "$data";           
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
        <form method="post" action="./add_category.php" id="f1">
            
            
            
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
                            <table>
                                <tr>
                                    <td>Enter Category:-</td>
                                    <td><input name="pc" type="text" id="pc" />

                                    </td>    
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <br>
                                            <input type="submit" name="addc" value="Add Category" id="c1_addc" />
                                    </td>
                                </tr>
                            </table>
    
                            
                            <table id="dc" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td>
                                        <table border="2">
                                            <h2>Category List</h2>
                                    </td>
                                </tr>
                                
                                <?php 
                                    while ($row = mysqli_fetch_object($res))
                                    {
                                
                                ?>
                                
                                <tr>
                                    <td>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo $row->PRODUCT_CATEGORY_NAME
                                                ?>
                                            </td>
                                            <td>
                                                <a href="category_delete.php?id=<?php echo $row->PRODUCT_CATEGORY_ID; ?>" onclick="javascript:return confrim('Are you sure delete this record?');">Delete</a>
                                            </td>
                                        </tr>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                
                                ?>
                                
                                
                                
                                <tr>
                                    <td>
                                        </table>
                                    </td>
                                </tr>
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
        <?php
        
        if(isset($_REQUEST['addc'])){
            $pc = $_REQUEST['pc'];
            $query = mysqli_query($con, "insert into tbl_product_category(PRODUCT_CATEGORY_NAME) values ('".$pc."')");

             $result = mysqli_query($con, $query);

            if(!$query)
            {
                echo mysqli_error();
            }
            else
            {
                echo "Records added successfully.";
            }
        }
             mysqli_close($con);
        

?>
    </body>
</html>

    

<?php
ob_flush();
?>