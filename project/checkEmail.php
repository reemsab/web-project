<?php
# create database connection
include("config.php");
$connection = OpenCon();
if(($_POST["email"])!="") {
  $q = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
  $result = mysqli_query($connection,$q);
  $num = mysqli_num_rows($result);
  if($num>0) {
    echo "email already exists";
  }else{
    
  }
}CloseCon($connection);
?>
