<!DOCTYPE html>
 <html>
   <head>
    <title>Admin Login</title>

<?php



session_start();

    
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST['username'];
$password = $_POST['password'];
//td: validate input
$error="";
if($name === "" || $password=="")
{
    //td: display and report errmsg
    echo '* you must fill all fields';
}
// validate admin creds
if ($name === 'admin'&& $password=='admin123')
{
//initialize session variables
$_SESSION['adminAccess']= true;
header("Location: dashboard.php");
    $error="";
}
else
{
    //td: display and report errmsg
    echo 'invalid LogIn';
}
}



    
    

   



?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
   </head>
   
   <body>
  
      <form name="form" action="" method="post">
          <h3>Admin Login</h3>
        <label><?php #error report here
        echo $error?></label>
        <input type="text" id="username" name= "username" placeholder="Enter your username"/>
        <input type="Password"  id="password" name= "password" placeholder="Enter your password"/>
        <input type = "submit" value = " Submit "/>
      </form>

  </body>
  </html>