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
        $err= "* all fields are mandatory";
    }
    else if($password != $confpass)
    {
        //td: display and report errmsg

        $err= "* your passwords do not match";

    }
    else
    {
        $query = "SELECT * FROM Users WHERE email = '$email' ";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1)
        {
            $err = "* this email is already registered";
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    </style>
   </head>
   
   <body>
      <form name="form" action="" method="post">
        <h3>Registeration</h3>
        <div class="error" ><?php echo $err; ?></div> 
        <input type="text" for="username" id="username" name= "username" placeholder="Enter your username"/>

        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email"/>
        <br>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        <input type="Password" for="confpass" id="confpass" name= "confpass" placeholder="Confirm your password"/>
        <input type = "submit" value = " Submit "/>

      </form>
 
  </body>
  </html>