<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$con = mysqli_connect('localhost','root','','grocery');

if(!$con)
{
    die("database not connect") or die(mysqli_connect_error($con));
}
?>
