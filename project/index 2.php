<?php


include("config.php");
$con = OpenCon();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start(); 

     $email = mysqli_real_escape_string($con,$_POST['email']);
     $password = mysqli_real_escape_string($con,$_POST['password']);

    if($email == "" ||$password =="" )
    {
            //td: display and report errmsg
            $err= "both password and  email are mandatory";
    }
    else
    {
        $query = "SELECT * FROM Users WHERE email = '$email' ";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)!=1)
        {
            $err = "this email not registered";
        }
        else
        {
           $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password' ";
            $result =mysqli_query($con,$query);
            if(mysqli_num_rows($result)!=1)
            {
                $err = "wrong email or password";
            }
            else
            {
                $row = mysqli_fetch_array($result);
                $_SESSION['id'] = $row['Id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                header("Location: home.php");
            }

        }

    }

}
CloseCon($con);
?>

<!DOCTYPE html>
 <html>
   <head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
   <script type="text/javascript" src="validate.js"></script>
   <body>

    <div class="container">
      <form name="form" action = "" method="post">
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $err; ?></div> 
       

        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email"/>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        
        <input type = "submit" value = " LogIn "/>

  </form>
</div>

</body>
</html>

