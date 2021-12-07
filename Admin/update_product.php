<!--image='".$_REQUEST['fileToUpload']."'-->

<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>";
    echo "alert(login first!!);";
    echo "window.location.href='../User/index.php'";
    echo "</script>";
    //header("location:../Admin/Admin.php"); 
}

include '../Database/db_connection.php';
?>
<?php
$PRODUCT_ID = $_REQUEST['id'];
$q = "select * from tbl_product where PRODUCT_ID=$PRODUCT_ID";
$res = mysqli_query($con, $q);
//$row= mysqli_fetch_object($con,$res);
if (isset($_REQUEST['btn_submit'])) {
    $reg = "update tbl_product set
                PRODUCT_NAME ='" . $_REQUEST['txt_pn'] . "',
                PRODUCT_DESC ='" . $_REQUEST['txt_pd'] . "',
                PRODUCT_PRICE='" . $_REQUEST['txt_pp'] . "',
                PRODUCT_QTY ='" . $_REQUEST['txt_pqty'] . "'
               
                where PRODUCT_ID =$PRODUCT_ID";
    mysqli_query($con, $reg);
    //echo $reg;
    header("Location: add_product.php");
}
?>
<?php
$PRODUCT_ID = $_REQUEST['id'];

$q = "select * from tbl_product where PRODUCT_ID=$PRODUCT_ID";
$res = mysqli_query($con, $q);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $nm = $row["PRODUCT_NAME"];
        $pde = $row["PRODUCT_DESC"];
        $pp = $row["PRODUCT_PRICE"];
        $pq = $row["PRODUCT_QTY"];
        
    }
}
// else {
//  echo "0 results";
//}
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
        <form method="post"  id="f1" enctype="multipart/form-data">

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
                        <hr/>
                        <!-- /. ROW  --> 

                        <center>
                            <h3>UPDATE PRODUCT</h3>
                            <table>
                                <tr>
                                    <td class="autocomplete">Product Name:-</td>
                                    <td><input name="txt_pn" type="text" id="txt_pn" value="<?php echo $nm; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Description:-</td>
                                    <td><input name="txt_pd" type="text" id="txt_pd" value="<?php echo $pde; ?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Price:-</td>
                                    <td><input name="txt_pp" type="text" id="txt_pp" value="<?php echo $pp; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                </tr>
                                <tr>
                                    <td>Product Quantity:-</td>
                                    <td><input name="txt_pqty" type="text" id="txt_pqty" value="<?php echo $pq; ?>"/>

                                    </td>
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
