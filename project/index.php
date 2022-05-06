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
            $err= "* Both password and  email are mandatory";
    }
    else
    {
        $query = "SELECT * FROM Users WHERE email = '$email' ";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)!=1)
        {
            $err = "* This email not registered";
        }
        else
        {
           $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password' ";
            $result =mysqli_query($con,$query);
            if(mysqli_num_rows($result)!=1)
            {
                $err = "* Wrong email or password";
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
   <link rel="icon" href="images/logonotext.png">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
function checkEmail() {
    jQuery.ajax({
    url: "checkEmailLogin.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
        document.getElementById('emailHint').innerHTML = data;

    },
    error:function (){}
    });
}
function logInButtonFunc(){
    var flagLogin=true;
    var textELogin=document.querySelector('#email').value;
    var textPLogin=document.querySelector('#password').value;
    if(textELogin==''){
        document.getElementById('emailHint').innerHTML = "* Please enter your email";
        flagLogin=false;

    }else{
        document.getElementById('emailHint').innerHTML = '';
    }
    if(textPLogin==''){
        document.getElementById('passwordHintLogin').innerHTML = "* Please enter your password";
        flagLogin=false;
    }else{
        document.getElementById('passwordHintLogin').innerHTML = '';
    }

return flagLogin;

}
</script>
  </head>
   <script type="text/javascript" src="validate.js"></script>
   <body>

<<<<<<< Updated upstream
    <div class="container">
      <form name="form" onsubmit="return logInButtonFunc()" action = "" method="post">
      <h3>Welcome Back!</h3>
=======
<div class="container">
      <form action="" method="POST" name="form" onsubmit="return logInButtonFunc()">
      <img src="images/Bookfront logo2.png" class="logo">
      <h3>Login</h3>
>>>>>>> Stashed changes
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $err; ?></div> 
        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email"/>
        <span id="emailHint" class="error"></span>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        <span id="passwordHintLogin" class="error"></span>
        
<<<<<<< Updated upstream
        <input type = "submit" value = "Login "/>
        <br>
        <a href = 'register.php'>
        Don't have an account? Sign up here.
        </a>
=======
        <input type = "submit" value = " Login "/>
        <br><a href='register.php'>Don't have an account? register here!</a>
        <br><br><a href='admin.php'>Admin? login here!</a>
>>>>>>> Stashed changes
  </form>
</div>

</body>
</html>

