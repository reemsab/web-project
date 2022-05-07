<?php
session_start();
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    header("Location: admin.php");
} 
 include("adminmenu.php");
?>
<html>
<head>
<title>Orders</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<link rel="icon" href="images/logonotext.png">
<link rel="stylesheet" href="menu.css">
<script>
  $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</head>
<body>
<h1>Orders</h1>
<div class=page>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
  <tr>
    <th>Order No</th> <th>Customer Email</th> <th>Total</th>
  </tr>
</thead>
</table>
</div>
<div class="tbl-content">
  <table cellpadding="0" cellspacing="0" border="0">

<?php
$con = OpenCon();
$query = "SELECT * FROM Orders";
$result = mysqli_query($con,$query);
if ($result->num_rows > 0)
{ 
  // output data of each row  
  while($row = $result->fetch_assoc())
{ 
    echo "<tr>" . "<td>" . $row['Id']. "</td>" . "<td>" . $row['custEmail']. "</td>" ."<td>" . $row['total']. "</td>" ."</tr>";
     
  }}
CloseCon($con);?>
</table>
</div>
</div>
</body>
</html>
