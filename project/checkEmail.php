<?php
# create database connection
$connection = mysqli_connect("localhost","root","root","project");
if(($_POST["email"])!="") {
  $q = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
  $result = mysqli_query($connection,$q);
  $num = mysqli_num_rows($result);
  if($num>0) {
    echo "<span style='color:red'> email already exists!</span>";
  }else{
    echo "<span style='color:green'> valid email</span>";
  }
}
?>