<?php
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    header("Location: admin.php");
} 
 //testing commit
?>
<html>
<head>
<title> Add Products</title>
    <script>

function addProuductButtonFunc(){
    var flagPro=true;
    var textNamePro=document.querySelector('#name').value;
    var srcPhoto=document.querySelector('#img').src;
    var textPricePro=document.querySelector('#price').value;
    var textDescriptionPro=document.querySelector('#desc').value;
    var textQuantityPro=document.querySelector('#quant').value;


    if(textNamePro==''){
        document.getElementById('NameHint').innerHTML = "please enter product's name";
        flagPro=false;

    }else{
        document.getElementById('NameHint').innerHTML = '';
    }
    if(srcPhoto==''){
        document.getElementById('PhotoHint').innerHTML = "please enter product's photo";
        flagPro=false;
    }else{
        document.getElementById('PhotoHint').innerHTML = '';
    }
    if(textPricePro==''){
        document.getElementById('PriceHint').innerHTML = "please enter product's price";
        flagPro=false;
    }else{
        document.getElementById('PriceHint').innerHTML = '';
    }
    if(textQuantityPro==''){
        document.getElementById('QuantityHint').innerHTML = "please enter product's quantity";
        flagPro=false;
    }else{
        document.getElementById('QuantityHint').innerHTML = '';
    }
    if(textDescriptionPro==''){
        document.getElementById('DescriptionHint').innerHTML = "please enter product's description";
        flagPro=false;
    }else{
        document.getElementById('DescriptionHint').innerHTML = '';
    }
    


return flagPro;

}
</script>
</head>
<body>
<h1>Add Products</h1>
 <form name="form" onsubmit="return addProuductButtonFunc()" action="" method="post" id="form">
        <input type="text"  id="name" name= "name" placeholder="Enter producct name">
        <span id="NameHint" style="color:red;"></span>
        <input type ="file" id="img" name="img" >
        <span id="PhotoHint" style="color:red;"></span>
        <input type="number" step="0.01" name="price" id ="price" placeholder="Enter producct price" >
         <span id="PriceHint" style="color:red;"></span>
        <input type=number step=1 id="quant" name="quant" placeholder="Enter producct quantity">
        <span id="QuantityHint" style="color:red;"></span>
        <textarea id = "desc" name ="desc" form="form" placeholder="Enter product descritipn" ></textarea>
        <span id="DescriptionHint" style="color:red;"></span>
        
        <input type = "submit" value = " Submit ">
 </form>
<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>  

</body>
</html>
