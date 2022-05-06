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
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
function checkEmail() {
    jQuery.ajax({
    url: "checkEmailLogin.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
        document.getElementById('emailHint').value = data;

    },
    error:function (){}
    });
}
function logInButtonFunc(){
    var flagLogin=true;
    var textELogin=document.querySelector('#email').value;
    var textPLogin=document.querySelector('#password').value;
    
    if(textPLogin==''){
        document.getElementById('passwordHintLogin').innerHTML = "please enter your password";
        flagLogin=false;
    }else{
        document.getElementById('passwordHintLogin').innerHTML = '';
    }
    if(textELogin==''){
        document.getElementById('emailHint').innerHTML = "please enter your email";
        flagLogin=false;
        return false;
    }
    if(((document.getElementById('emailHint').value).match("email doesn't exists!"))){ flagLogin=false;
        document.getElementById('emailHint').innerHTML="email doesn't exists!"}
        else{
        document.getElementById('emailHint').innerHTML = "";
    }
   
    document.getElementById('error').innerHTML ="";

return flagLogin;

}
</script>
  </head>
   <script type="text/javascript" src="validate.js"></script>
   <body>

    <div class="container">
      <form name="form" onsubmit="return logInButtonFunc()" action = "" method="post">
        <div style = "font-size:11px; color:#cc0000; margin-top:10px" id="error"><?php echo $err; ?></div> 
       

        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email" onInput="checkEmail()"/>
        <span id="emailHint" style="color:red;"></span>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        <span id="passwordHintLogin" style="color:red;"></span>
        
        <input type = "submit" value = " LogIn "/>

  </form>
</div>
<button name="register" id ="register"
    onclick="window.location.href = 'register.php';">
        Register
    </button>
</body>
</html>

