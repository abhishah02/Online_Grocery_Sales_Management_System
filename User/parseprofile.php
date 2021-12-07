<?php
    include '../Database/db_connection.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['id']))
            {
                $USER_ID=$_SESSION['id'];
                
                $query="Select * from tbl_user where USER_ID=:USER_ID";
                $result=musqli_query($con,$query);
                $result->execute(array(':USER_ID'));
                
                while ($rs = $result->fetch()){
                    $USER_NAME = $rs['Name'];
                    $USER_ADDRESS = $rs['Address'];
                    $USER_EMAIL_ID = $rs['Email Id'];
                    $USER_NUMBER = $rs['Mobile Number'];    
                }
                $encode_id = base64_encode("encodeuserid{$USER_ID}");
            }
        ?>
    </body>
</html>
