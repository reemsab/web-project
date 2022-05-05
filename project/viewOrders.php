<?php
session_start();
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    header("Location: admin.php");
} 
 
?>
<html>
<head>
<title> view orders</title>
</head>
<body>
<h1>View Orders</h1>
<table>
<th>Order No</th> <th>Customer Email</th> <th>Total</th>
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
<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>  
</body>
</html>
