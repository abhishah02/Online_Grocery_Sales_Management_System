<?php 

include '../Database/db_connection.php';

$categoryid = $_POST['categoryid'];

//if(isset($_POST['categoryid'])){
//   $categoryid = mysqli_real_escape_string($con,$_POST['category']); // category id
//}

$result = mysqli_query($con,"select PRODUCT_ID,PRODUCT_NAME from tbl_product where PRODUCT_CATEGORY = $categoryid");
$products_arr = array();

//if($categoryid > 0){
//   $sql = "SELECT PRODUCT_ID ,PRODUCT_NAME FROM tbl_product WHERE PRODUCT_CATEGORY=".$categoryid;
//
//   $result = mysqli_query($con,$sql);
//
//   while( $row = mysqli_fetch_array($result) ){
//      $productid = $row['PRODUCT_ID'];
//      $productname = $row['PRODUCT_NAME'];
//
//      $users_arr[] = array("id" => $productid, "name" => $productname);
//   }
//}

while($row = mysqli_fetch_array($result)){
    $object[] = array(
        "id" => $row["PRODUCT_ID"],
        "name" => $row["PRODUCT_NAME"],
    );
}

header("content-type: application/json");
// encoding array to json format
echo json_encode($products_arr);

?>