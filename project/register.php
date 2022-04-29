<!DOCTYPE html>
 <html>
   <head>
    <title>Registeration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
function checkEmail() {
    jQuery.ajax({
    url: "checkEmail.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
        document.getElementById('emailHint').innerHTML = data;

    },
    error:function (){}
    });
}
function registerButtonFunc(){
    var flag=true;
    var textn=document.querySelector('#username').value;
    var textE=document.querySelector('#email').value;
    var textP=document.querySelector('#password').value;
    var textCP=document.querySelector('#confpass').value;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(textn==''){
        document.getElementById('nameHint').innerHTML = "* Please enter your name";
        flag=false;

    }else{
        document.getElementById('nameHint').innerHTML = '';     
    }
    if(textE==''){
        document.getElementById('emailHint').innerHTML = "* Please enter your email";
        flag=false;

    }else if(!(textE.match(emailformat))){
        document.getElementById('emailHint').innerHTML = "* Invalid email format";
        flag=false;
    }else{
        document.getElementById('emailHint').innerHTML = '';
    }
    if(textP==''){
        document.getElementById('passwordHint').innerHTML = "* Please enter your password";
        flag=false;
    }else{
        document.getElementById('passwordHint').innerHTML = '';
    }

    if(textCP==''){
        document.getElementById('passwordConfirmHint').innerHTML = "* Please enter your confirm password";

        flag=false;
    }else if(!(textCP.match(textP))){
        document.getElementById('passwordConfirmHint').innerHTML = "* Passwords doesn't match";
         flag=false;
    }else{
        document.getElementById('passwordConfirmHint').innerHTML = '';
    }
return flag;
}
</script>   
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
        $err= "* All fiels are mandatory";
    }
    else if($password != $confpass)
    {
        //td: display and report errmsg

        $err= "* Your passwords do not match";

    }
    else
    {
        $query = "SELECT * FROM Users WHERE email = '$email' ";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1)
        {
            $err = "* This email is already registered";
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
   </head>
   
   <body>
      <form name="form" onsubmit="return registerButtonFunc()" action="" method="post">
        <h3>Sign Up</h3>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $err; ?></div> 
        <input type="text" for="username" id="username" name= "username" placeholder="Enter your username"/>
        <span id="nameHint" class="error"></span>
        <input type="email" for="email" id="email" name= "email" placeholder="Enter your email"/>
        <span id="emailHint" class="error"></span>
        <input type="Password" for="password" id="password" name= "password" placeholder="Enter your password"/>
        <span id="passwordHint" class="error"></span>
        <input type="Password" for="confpass" id="confpass" name= "confpass" placeholder="Confirm your password"/>
        <span id="passwordConfirmHint" class="error"></span>
        <input type = "submit" value = " Submit "/>

      </form>
 
  </body>
  </html>
