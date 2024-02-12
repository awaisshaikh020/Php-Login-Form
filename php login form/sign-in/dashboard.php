<?php
include_once "connection.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootsrap-5 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    
    if(isset($_SESSION['name'] ))
    {
        echo " welcome ".$_SESSION['name'];
    }
    else{
        header('location:signin.php');
    }
    ?>
    <br><br>
    <a href="logout.php" class="btn btn-danger m-2">Logout</a>
</body>

</html>