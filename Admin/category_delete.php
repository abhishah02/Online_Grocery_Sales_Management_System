<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$PRODUCT_CATEGORY_ID = $_REQUEST['id'];

include '../Database/db_connection.php';

$query = "delete from tbl_product_category where PRODUCT_CATEGORY_ID=$PRODUCT_CATEGORY_ID";
mysqli_query($con, $query);

header("location:add_category.php");


?>
