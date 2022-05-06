<?php
include("config.php");
$connection = OpenCon();
if(($_POST["email"])!="") {
  $q = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
  $result = mysqli_query($connection,$q);
  $num = mysqli_num_rows($result);
  if($num==0) {
    echo "email doesn't exists!";
  }else{
    echo "email exists";
  }
}CloseCon($connection);

?>
