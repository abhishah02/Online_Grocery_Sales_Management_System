
<?php


ob_start();

session_start();
/*if(isset($_SESSION['email']))
{
      header("location:../Admin/Admin.php"); 
}

if(isset($_SESSION['emailId']))
{
     header("location:home.php");
}*/

include '../Database/db_connection.php';

?>
<?php
$USER_EMAIL_ID = $_SESSION['emailId'] ;
$q="SELECT * FROM tbl_user where USER_EMAIL_ID='$USER_EMAIL_ID'";
$res=mysqli_query($con,$q)or die(mysqli_error());
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $name = $row["USER_NAME"];
        $add = $row["USER_ADDRESS"];
        $number = $row["USER_NUMBER"];   
    }
}
if (isset($_REQUEST['btnsubmit'])) {
    $reg = "update tbl_user set
                USER_NAME ='" . $_REQUEST['cl_name'] . "',
                USER_ADDRESS ='" . $_REQUEST['c1_address'] . "',
                USER_NUMBER='" . $_REQUEST['c1_mnumber'] . "'
                
              where USER_EMAIL_ID='$USER_EMAIL_ID'";             
    mysqli_query($con, $reg);
    //echo $reg;
    header("Location: home.php");
}

       
// else {
//  echo "0 results";
//}
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
    Profile
    <span></span>
    </h1></div>

    <div class="box"> 
        Name <input name="cl_name" type="text" id="cl_name" class="field" style="width:206px;" value="<?php echo $name; ?>"  />
        
        <br />
    
    <label>Address</label>
    <textarea name="c1_address" rows="5" cols="10" id="c1_uadd" class="field" style="width:206px;" value=""><?php echo $add; ?></textarea>
        
    
    <label>Mobile Number </label>
    <input name="c1_mnumber" type="text" maxlength="10" id="c1_mnumber" class="field" style="width:206px;" pattern="[6789][0-9]{9}" size="10" value="<?php echo $number; ?>" />
   
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
ob_flush();
?>
