<?php 
    session_start();
    ob_start();
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
            session_destroy();
            $_session['emailId']=NULL;
            header('location:../User/index.php');
        ?>
    </body>
</html>

<?php

ob_flush();
?>