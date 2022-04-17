<!DOCTYPE html>
 <html>
   <head>
    <title>Admin</title>

<?php

//define error dict
// lets comment

session_start();

    
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST['username'];
$password = $_POST['password'];
//td: validate input
if($name === "" || $password=="")
{
    //td: display and report errmsg
    echo 'you must fill all fields';
}
// validate admin creds
if ($name === 'admin'&& $password=='admin123')
{
//initialize session variables
$_SESSION['adminAccess']= true;
header("Location: dashboard.php");}
else
{
    //td: display and report errmsg
    echo 'invalid LogIn';
}
}



    
    

   



?>



   </head>
   
   <body>
  
      <form name="form" action="" method="post">
        <input type="text" id="username" name= "username" placeholder="Enter your username"/>
        <input type="Password"  id="password" name= "password" placeholder="Enter your password"/>
        <input type = "submit" value = "Submit"/>
      </form>
    <form name="logout" action="logOut.php" id=logout>
<input type = "submit" value = "LogOut">
</form>
  </body>
  </html>