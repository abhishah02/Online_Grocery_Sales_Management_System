

<?php
session_start();
ob_start();


if(isset($_SESSION['email']))
{
      header("location:../Admin/Admin.php"); 
}

if(isset($_SESSION['emailId']))
{
     header("location:home.php");
}

include '../Database/db_connection.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <title>Online Grocery Shop</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    
</head>
<body>
    <form method="post" enctype="multipart/form-data">
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
       
  

    <center>
   
   
    <div class="box search" >
    <br />   
    <h2>
    LOGIN
    <span></span>
    </h2>
    <div class="box-content" > 
    <label>Email Id</label>
            <input name="c1_txt_email" type="text" id="c1_txt_email" class="field" style="width:206px;" Required/>
            
            <label>Password</label>
            <input name="c1_txt_password" type="password" id="c1_txt_password" class="field" style="width:206px;" Required/>
            
            <input type="submit" name="c1_Submit" value="Login" id="c1_Submit" class="search-submit" style="height:27px;width:70px;" /> 
            <span id="c1_mess" style="color:Red;"></span>
            <a href="Forgetpass.php">Forget Password</a>
            <td colspan="2" align="center">
    </div>
         
</div> 
<?php
   
//    if(isset($_REQUEST['c1_Submit']))
//    {
//        if($_POST['c1_txt_email']=='admin' && $_POST['c1_txt_password']=='admin'){
//            header('location:Admin.php');
//        }
//    }
?>
</center>
    

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
    if(isset($_REQUEST['c1_Submit']))
    {
        $USER_EMAIL_ID = $_REQUEST['c1_txt_email'];
        $USER_PASSWORD = $_REQUEST['c1_txt_password'];
        
    
        
        $password_de=md5($USER_PASSWORD);
        
       $query = "select USER_EMAIL_ID,USER_PASSWORD,USER_ROLE,USER_ID from tbl_user where USER_EMAIL_ID = '".$USER_EMAIL_ID."' and USER_PASSWORD = '".$password_de."' and status=0";
//       echo $query;
       $result = mysqli_query($con, $query);
       $row = mysqli_fetch_array($result);
       print_r($row);
//       echo 'hello lorem ipsum';
       $USER_ID = $row["USER_ID"];
//       echo $row["USER_EMAIL_ID"];
//       echo $row["USER_PASSWORD"];
//       echo $row["USER_ROLE"];
//      
//       echo $emailID;
//       echo $password;
       
       if( $USER_EMAIL_ID== $row["USER_EMAIL_ID"] && $password_de==$row["USER_PASSWORD"] && $row["USER_ROLE"] === 'a' )
       {
           $_SESSION['email'] = $USER_EMAIL_ID;
         //  $_SESSION[''] = $emailID;
           
            header("location:../Admin/Admin.php");
          // echo "<script>alert('This is for testing')</script>";
           
       }
       else if($USER_EMAIL_ID == $row["USER_EMAIL_ID"] && $password_de== $row["USER_PASSWORD"] && $row["USER_ROLE"] === 'u' )
       {
            $_SESSION['emailId'] = $USER_EMAIL_ID;
            $_SESSION['user_id'] = $USER_ID;
            header("location:home.php");

       }
       else{
            echo '<script>alert("Invalid Credential");</script>';
       }
       
//       if($emailID == "admin" && $password == "admin")
//        {
//            
//            //echo"success"; 
//        }
//        else{
//            header("location:home.php");
//        }
        //$result = mysqli_query($con, $query);
       //$row = mysqli_num_rows($result);
       //echo $result;
       //if(strcmp($emailID,"admin") && strcmp($password,"admin"))
        
        
    }
?>


</body>
</html>
<?php
ob_flush();
?>