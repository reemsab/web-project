<!DOCTYPE html>
 <html>
   <head>
    <title>Admin</title>
<script>

function logInAdminButtonFunc(){
    var flagLoginAdmin=true;
    var textULoginAdmin=document.querySelector('#username').value;
    var textPLoginAdmin=document.querySelector('#password').value;
    if(textULoginAdmin==''){
        document.getElementById('usernameHintLoginAdmin').innerHTML = "please enter your username";
        flagLoginAdmin=false;

    }else{
        document.getElementById('usernameHintLoginAdmin').innerHTML = '';
    }
    if(textPLoginAdmin==''){
        document.getElementById('passwordHintLoginAdmin').innerHTML = "please enter your password";
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



   </head>
   
   <body>
  
      <form name="form" onsubmit="return logInAdminButtonFunc()" action="" method="post">
        <input type="text" id="username" name= "username" placeholder="Enter your username"/>
        <span id="usernameHintLoginAdmin" style="color:red;"></span>
        <input type="Password"  id="password" name= "password" placeholder="Enter your password"/>
        <span id="passwordHintLoginAdmin" style="color:red;"></span>
        <input type = "submit" value = " Submit "/>
      </form>

  </body>
  </html>
