<?php 
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
 $q="select * from tbl_user";
 $res=mysqli_query($con,$q);
//while($row=mysql_fetch($res))
//{
//$USER_ID=$row['id'];
////$data=$row['detail'];
//$status=$row['status'];
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
<form method="post">



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
                    
                    <h1>Welcome</h1>
                     <table border="2">
                        <tr>
                            <th>Name</th>
                            <th>MNO</th>
                            <th>Address</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php while($row= mysqli_fetch_object($res))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row->USER_NAME?></td>
                            <td><?php echo $row->USER_NUMBER?></td>
                            <td><?php echo $row->USER_ADDRESS?></td>
                     
                            <td>
                                
                                <?php 
                            if($row->status==0)
                            {
                                
                                    
                                    echo "<input type=submit value=Active/Dactive name='".$row->USER_ID."'/>";
                                    
                                    if(isset($_REQUEST[$row->USER_ID]))
                                    {
                                        $ac="update tbl_user set status=1 where USER_ID='".$row->USER_ID."' ";
                                        $acrs= mysqli_query($con, $ac);
                                       header("Refresh:0");
                                        
                                    }
                                
                                }
                                else{
                                    echo "<input type=submit value=Active/Dactive name='".$row->USER_ID."'/>";
                                    
                                    if(isset($_REQUEST[$row->USER_ID]))
                                    {
                                        $ac="update tbl_user set status=0 where USER_ID='".$row->USER_ID."' ";
                                        $acrs= mysqli_query($con, $ac);
                                       header("Refresh:0");
                                        
                                }
                                    
                                }
                                echo "<td>";
                                if($row->status==0)
                            {
                                echo"Active</td>";
                            }
                            else{
                                echo"Deactive</td>";
                            }
                        }
                                
                                ?>
                                
                                
                                                  </td>
                    </table>
                                      <!-- /. ROW  -->  
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2021 | Design by: <a href="#" style="color:#fff;" target="_blank">Abhi Shah & Naivil Patel</a>
                </div>
            </div>
        </div>
          

  
    
</form>   
</body>
</html>


<?php
                                if(isset($_REQUEST['act']))
                                {
                                    $ac="upadate tbl_user set status=1 where ";
                                    $acrs= mysqli_query($con, $ac);
                                }
                                
                                ?>

<?php
     ob_flush();
?>