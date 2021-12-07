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
//    $query = "select * from tbl_product_category";
//    $res = mysqli_query($con, $query);

  ?>


                        

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Online Grocery Shop Admin</title>
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
        
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
        <form method="post" id="f1">
            
            
            
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
                            <div class="container">
                                <h2 style="text-align: center;">Update and Delete Product</h2><br><br>
                                <form action="" method="post">
                                    <div class="col-md-3"></div>
                                        <div class="form-group col-md-6">
                                        
                                        <!-- Category dropdown -->
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category">
                                            <option value="">Select Category</option>
                                            <?php 
                                                $query = "SELECT * FROM `tbl_product_category`";
                                                $result = $con->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<option value='{$row["PRODUCT_CATEGORY_ID"]}'>{$row['PRODUCT_CATEGORY_NAME']}</option>";
                                                    }
                                                }else{
                                                    echo "<option value=''>Category not available</option>"; 
                                                }
                                            ?>
                                        </select><br>

                                        <!-- Product dropdown -->
                                        <label for="product">Product</label>
                                        <select class="form-control" id="product">
                                            <option value="">Select Product</option>
                                        </select><br>

                                        
                                </form>
                            </div>
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
        
        
        <script>
    $(document).ready(function(){

    $("#category").on('change' ,function(){
        //var categoryid = $(this).val();
        $("#product").html("<option value=''>Select Product</option>");
        $.ajax({
            url: './get_product.php',
            type: 'post',
            data: {"id":$("#category").val()},
//            dataType: 'json',
            success:function(result){
                
                var str = "<option value=''>Select Product</option>";
                $.each(result,function(key,value) {
                    str = str + "<option value='"+value.PRODUCT_ID+"'>"+value.PRODUCT_NAME+"</option>";
                });
                $("#product").html(str);
            },
            error:function(err){
                alert("error");
            }

//                var len = response.length;
//
//                $("#product").empty();
//                for( var i = 0; i<len; i++){
//                    var id = response[i]['PRODUCT_ID '];
//                    var name = response[i]['PRODUCT_NAME'];
//                    
//                    $("#product").append("<option value='"+PRODUCT_ID+"'>"+PRODUCT_NAME+"</option>");
//
//                }
//            }
        });
    });

});


</script>
        
    </body>
    
    
    
</html>

    

<?php
ob_flush();
?>

