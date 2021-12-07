<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$PRODUCT_ID =$_REQUEST['id'];
$con = mysqli_connect('localhost','root','','grocery');
$q="delete from `tbl_product` where PRODUCT_ID=$PRODUCT_ID";
mysqli_query($con,$q);
//echo $q;
header("location:add_product.php");
?>