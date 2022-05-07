<?php
session_start();
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    header("Location: admin.php");
}

 //testing commit
 $con = OpenCon();
 if($_SERVER["REQUEST_METHOD"] == "POST"){
 //if(isset($_POST['Add Product'])){
     $name = mysqli_real_escape_string($con, $_POST['name']);
     $img = $_FILES['img']['name'];
     $img_tmp_name = $_FILES['img']['tmp_name'];
     $img_folder = 'images/'.$img;


     $price = $_POST['price'];
     $quant = $_POST['quant'];
     $desc = $_POST['desc'];
     $msg="";

     $search_product = mysqli_query($con, "SELECT * FROM products WHERE name = '$name' ");
     if($search_product->num_rows > 0 ) {
        $msg = "Product already added!";
     }
     else {
        $result = mysqli_query($con,"INSERT INTO products (name, photo, price, quantity, description) VALUES ('$name', '$img', '$price', '$quant', '$desc')") or die('query failed');
        if($result){
            $msg = "Product Added Successfully!";
            move_uploaded_file($img_tmp_name, $img_folder);
        }
     }
 }
include("adminmenu.php");
?>

<html>
<head>
<title> Add Products</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="menu.css">
<link rel="icon" href="images/logonotext.png">
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
    /*if(srcPhoto==''){
        document.getElementById('PhotoHint').innerHTML = "please enter product's photo";
        flagPro=false;
    }else{
        document.getElementById('PhotoHint').innerHTML = '';
    }*/
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
 <form name="form" onsubmit="return addProuductButtonFunc()" action="" method="post" id="form" enctype="multipart/form-data">
        <h3>Add Products</h3><br>
        <input type="text"  id="name" name= "name" placeholder="Enter product name">
        <span id="NameHint" style="color:red;"></span>
        <input type ="file" id="img" name="img" >
        <span id="PhotoHint" style="color:red;"></span>
        <input type="number" step="0.01" name="price" id ="price" placeholder="Enter product price" >
         <span id="PriceHint" style="color:red;"></span>
        <input type=number step=1 id="quant" name="quant" placeholder="Enter product quantity">
        <span id="QuantityHint" style="color:red;"></span>
        <textarea id = "desc" name ="desc" form="form" placeholder="Enter product description" ></textarea>
        <span id="DescriptionHint" style="color:red;"></span>
        
        <input type = "submit" value = "Add Product" name ="Add Product"><br>
        <p><?php echo $msg; ?></p> 
 </form>
</body>
</html>
