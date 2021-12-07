<?php
$con = mysqli_connect('localhost','root','','grocery');
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
       
  
   <link href="css1/style.css" rel="stylesheet" type="text/css" />
   <link href="css1/ie6.css" rel="stylesheet" type="text/css" />
    <center>
   
   
    <div class="box search" style="margin-top:-18px">
    <br />   
    <h2>
    Forget Password
    <span></span>
    </h2>
    <div class="box-content"> 
    <label>New Password</label>
    <input name="c1_txt_NewPassword" type="password" id="c1_txt_NewPassword" class="field" style="width:206px;" />
            <span id="c1_Rq_un" style="color:#CC0000;visibility:hidden;">Required</span>
            <label>Confirm Password</label>
            <input name="c1_txt_conpassword" type="password" id="c1_txt_conpassword" class="field" style="width:206px;" />
            <span id="c1_req_ps" style="color:#CC0000;visibility:hidden;">Required</span>
            <input type="submit" name="c1_Submit" value="submit" id="c1_Submit" class="search-submit" style="height:27px;width:70px;" /> 
            <span id="c1_mess" style="color:Red;"></span>
            
            <td colspan="2" align="center">
            <?php
                if(isset($_REQUEST['c1_Submit'])){
                header('location:index.php');
                }
            ?>
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
  
  
  <?php
                    include './footer.php';
?>  
    

  <!-- End Footer -->
</div>
<!-- End Shell -->
</form>
