<?php

//session_start();

$con = mysqli_connect('localhost','root','','grocery');
if(!$con)
{
    die("database not connect") or die(mysqli_connect_error($con));
}
?>
    
<?php
 $uid=$_REQUEST['id'];
 $q="select * from tbl_user where uid=$uid";
 $res=mysqli_query($con,$q);
 $row= mysqli_fetch_object($res);
      if(isset($_REQUEST['btnsubmit']))
        {
        $reg = "update tbl_user set
               name='".$_REQUEST['c1_uname']."',
               mnumber='".$_REQUEST['c1_mnumber']."',
               address='".$_REQUEST['c1_address']."'
               where uid=$uid";
        mysqli_query($con, $reg);
       //echo $reg;
        header("location:home.php");
        }
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
  <div id="header">
    <h1 id="logo"><a href="#">Online Grocery Shop</a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="#" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      <span>Total Items:<span id="counttoitem">0</span></span> &nbsp;&nbsp; <span>Cost:<span id="counttoprice">0</span></span> </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">The Store</a></li>
       
        <li><a href="#">Sign in</a></li>   
        <li><a href="#">Sign Up</a></li>         
        <li><a href="#">LogOut</a></li>       
        
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
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
   Edit Registration
    <span></span>
    </h1></div>

    <div class="box"> 
    Name <input name="c1_uname" value="<?php echo $row->name?>" type="text" id="c1_uname" class="field" style="width:206px;" />
        <span id="c1_Req_txtname" style="color:#CC0000;visibility:hidden;">Required</span>
        <br /> 
    <label>Mobile Number </label>
    <input name="c1_mnumber" type="text" value="<?php echo $row->mnumber?>" maxlength="10" id="c1_mnumber" class="field" style="width:206px;" />
    <span id="c1_req_mn" style="color:#CC0000;visibility:hidden;">Enter 10 Digites</span>
    
     <label>Address</label>
    <textarea name="c1_address"  value="<?php echo $row->address?>" rows="5" cols="10" id="c1_uadd" class="field" style="width:206px;"></textarea>
        <span id="c1_r_txtadd" style="color:#CC0000;visibility:hidden;">Required</span>
   
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
      <div class="box categories">
        <h2>Categories <span></span></h2>
        <div class="box-content">
          <ul>
            <table id="pc" cellspacing="0" style="border-collapse:collapse;">
	<tr>
		<td>
            <li><a href="#">Vegetables</a></li>    
            </td>
	</tr><tr>
		<td>
            <li><a href="#">Fruits</a></li>    
            </td>
	</tr><tr>
		<td>
            <li><a href="#">Coffee</a></li>    
            </td>
	</tr><tr>
		<td>
            <li><a href="#">Soft-Drinks</a></li>    
            </td>
	</tr>
</table>

          </ul>
        </div>
      </div>
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
  
  
    <div id="footer">
        <p class="left"> <a href="#">Home</a> <span>|</span> <a href="Login.php">Login</a> <span>|</span> <a href="#">The Store</a> <span>|</span></p>
    <p class="right"> &copy; 2020. Design by <a href="#">Abhi Shah & Naivil Patel</a> </p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->

    </form>
</body>
</html>


