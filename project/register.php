<!DOCTYPE html>
 <html>
   <head>
    <title>Registeration</title>
    
<?php


include("config.php");
session_start();
$con = OpenCon();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confpass = mysqli_real_escape_string($con,$_POST['confpass']);


    if($name == "" ||$email == "" ||$password =="" ||$confpass =="")
    {
        //td: display and report errmsg
        $err= "all fiels are mandatory";
    }
    else if($password != $confpass)
    {
        //td: display and report errmsg

        $err= "your passwords do not match";

    }
    else
    {
        $query = "SELECT * FROM Users WHERE email = '$email' ";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1)
        {
            $err = "this email is already registered";
        }
        else
        {
           $query = "INSERT INTO Users VALUES('$name', '$email', '$password')";
            $result =mysqli_query($con,$query);
            header("Location: index.php");

        }
    
    
     }



 }
CloseCon($con);
?>
   </head>
   
   <body>
      <form name="form" action="" method="post">

        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $err; ?></div> 
        <input type="text" for="username" id="username" name= "username" placeholder="Enter your username"/>

        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email"/>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        <input type="Password" for="confpass" id="confpass" name= "confpass" placeholder="Confirm your password"/>
        <input type = "submit" value = " Submit "/>

      </form>
 
  </body>
  </html>