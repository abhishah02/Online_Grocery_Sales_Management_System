<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$con = mysqli_connect('localhost','root','','grocery');
//$PRODUCT_ID = $_REQUEST['id'];
$ADD_TO_CART_ID=$_GET['id'];
//echo $ADD_TO_CART_ID;
$q="delete from tbl_add_card where ADD_TO_CART_ID=$ADD_TO_CART_ID";
mysqli_query($con,$q);
//echo $q;
header("location:view_cart.php");
?>