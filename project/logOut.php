
<?php

    session_start();
    if(isset($_SESSION['adminAccess'])){
        session_destroy();
        header("location: admin.php");
    }

    if(isset($_SESSION['id'])){
        session_destroy();
        header("location: index.php");
    }
    

?> 
