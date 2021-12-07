

<?php


ob_start();
session_start();

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
    <form method="post">

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
 <center>
<div class="search">
    <div>    <br />   
    <h1>
    Registration
    <span></span>
    </h1></div>

    <div class="box"> 
    Name <input name="cl_name" type="text" id="cl_name" class="field" style="width:206px;" required />
        
        <br />
    
    <label>Address</label>
    <textarea name="c1_address" rows="5" cols="10" id="c1_uadd" class="field" style="width:206px;" required></textarea>
       
    <label>Email Id</label>
    <input name="c1_uemail" type="email" id="c1_uemail" class="field" style="width:206px;" required/>
        
    
    <label>Mobile Number </label>
    <input name="c1_mnumber" type="text" maxlength="10" id="c1_mnumber" class="field" style="width:206px;" pattern="[6789][0-9]{9}" size="10" required />

    <label>Password</label>
    <input name="c1_password" type="password" id="c1_password" class="field" style="width:206px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
      
    <input type="submit" name="btnsubmit" value="SUBMIT" class="search-submit" style="height:27px;width:70px;" />
    
    <span id="c1_Label1"></span>
    </div>
</div>
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


</body>
</html>
<?php
    /*$nameErr = $emailIDErr = "";
    $name = $emailID = "";*/

    
    
    if(isset($_REQUEST['btnsubmit']))
    {
        $USER_NAME=$_REQUEST['cl_name'];
        $USER_ADDRESS = $_REQUEST['c1_address'];
        $USER_EMAIL_ID = $_REQUEST['c1_uemail'];
        $USER_NUMBER = $_REQUEST['c1_mnumber'];
        $USER_PASSWORD = $_REQUEST['c1_password']; 
        
        
//        $USER_NAME = $USER_ADDRESS = $USER_EMAIL_ID = $USER_NUMBER = $USER_PASSWORD = "";
//        
//        if($_SERVER["REQUEST_METHOD"] == "POST")
//        {
//            $USER_NAME = test_input["cl_name"];
//            $USER_ADDRESS = test_input["c1_address"];
//            $USER_EMAIL_ID = test_input["c1_uemail"];
//            $USER_NUMBER = test_input["c1_mnumber"];
//            $USER_PASSWORD = test_input["c1_password"];
//        }
//        
//        function test_input($data) {
//            $data = trim($data);
//            $data = stripslashes($data);
//            $data = htmlspecialchars($data);
//            return $data;
//        }
        
        $USER_PASSWORDmd5 = md5($USER_PASSWORD);    
        $reg = "insert into tbl_user(USER_NAME , USER_ADDRESS , USER_EMAIL_ID , USER_NUMBER , USER_PASSWORD) values('$USER_NAME' , '$USER_ADDRESS' , '$USER_EMAIL_ID' , '$USER_NUMBER' , '$USER_PASSWORDmd5')";
        if(mysqli_query($con, $reg))
        {
            echo '<script type="text/javascript">';
            echo '<script>alert("Registration Done")</script>';
            echo '</script>
';
        }
        header('location:index.php');
    }
        
        /*if($_SERVER["Request_method"] == "Post"){
            if(empty($_POST["cl_name"])){
                $nameErr = "name is required";
            }
            else{
                $name = test_input($_POST["cl_name"]);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $nameErr)){
                    $nameErr = "Only letter and white space allow";
                }
            }
            
            if(empty($_POST["c1_uemail"])){
                $emailIDErr = "email is required";
            }
            else{
                $emailIDErr = test_input($_POST["c1_uemail"]);
                if(!filter_var($emailIDErr,FILTER_VALIDATE_EMAIL)){
                    $emailIDErr = "Invalid email format";
                }
            }
        }*/
        
        
    
?>    
<?php
ob_flush();
?>
