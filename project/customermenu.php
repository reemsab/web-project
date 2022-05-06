<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="menu.css">
<?php
    $con = OpenCon();
    session_start();
    $user=$_SESSION['username'];?>
</head>
<img src="images/Bookfront logo.png" style="margin-top: 30px;">
<div class="page">

  <nav class="page__menu page__custom-settings menu">
    <ul class="menu__list r-list">
        <li class="menu__group"><span class="welcome"><div class="menu__link r-link"><span class="material-symbols-outlined" style="margin-right: 10px;">
account_circle_full
</span>     Welcome, <?php echo $user?></div></span></li>
      <li class="menu__group"><a href="home.php" class="menu__link r-link text-underlined">Home</a></li>
      <li class="menu__group"><a href="cart.php" class="menu__link r-link text-underlined">Cart</a></li>
    </ul>
  </nav>
</div>
<div class="linktr">
  <a href="logOut.php" class="linktr__goal r-link"><span class="material-symbols-outlined">
logout
</span> Log out</a>
</div>
</html>