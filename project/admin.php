<!DOCTYPE html>
 <html>
   <head>
    <title>Admin Login</title>
<script>

function logInAdminButtonFunc(){
    var flagLoginAdmin=true;
    var textULoginAdmin=document.querySelector('#username').value;
    var textPLoginAdmin=document.querySelector('#password').value;
    if(textULoginAdmin==''){
        document.getElementById('usernameHintLoginAdmin').innerHTML = "* Please enter your username";
        flagLoginAdmin=false;

    }else{
        document.getElementById('usernameHintLoginAdmin').innerHTML = '';
    }
    if(textPLoginAdmin==''){
        document.getElementById('passwordHintLoginAdmin').innerHTML = "* Please enter your password";
        flagLoginAdmin=false;
    }else{
        document.getElementById('passwordHintLoginAdmin').innerHTML = '';
    }

return flagLoginAdmin;

}
</script>
<?php



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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
   </head>
   
   <body>
  
      <form name="form" onsubmit="return logInAdminButtonFunc()" action="" method="post">
        <h3>Admin Login</h3>
        <input type="text" id="username" name= "username" placeholder="Enter your username"/>
        <span id="usernameHintLoginAdmin" class="error"></span>
        <input type="Password"  id="password" name= "password" placeholder="Enter your password"/>
        <span id="passwordHintLoginAdmin" class="error"></span>
        <input type = "submit" value = " Submit "/>
      </form>

  </body>
  </html>
