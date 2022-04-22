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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
  </head>
   <script type="text/javascript" src="validate.js"></script>
   <body>

    <div class="container">
      <form name="form" action = "" method="post">
          <h3>Login</h3>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $err; ?></div> 
       

        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email"/>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        
        <input type = "submit" value = " Login "/>
        <br><a href='register.php'>Don't have an account? register here!</a>

  </form>
</div>
</body>
</html>

