<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Home</title>
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION['idC'])){
        include_once '../html/header1.php';
        $idC = $_SESSION['idC'];
    }
    else{
        include_once '../html/header.html';
        $idC=null;
    }
    ?>
    
    <div class="content">
        <div class="icons">
            <i class="uil uil-instagram"></i>
            <i class="uil uil-facebook"></i>
            <i class="uil uil-whatsapp"></i>
        </div>
        <div class="content-text">
            <h1>Mano já é a quinta vez que to fazendo o Homepage</h1>
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi maxime voluptas fugiat quia omnis, quo mollitia non quam quidem optio cum, numquam quae deserunt accusantium. Ipsa aut ad doloribus dolorum.</h3>
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi maxime voluptas fugiat quia omnis, quo mollitia non quam quidem optio cum, numquam quae deserunt accusantium. Ipsa aut ad doloribus dolorum.</h3>
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi maxime voluptas fugiat quia omnis, quo mollitia non quam quidem optio cum, numquam quae deserunt accusantium. Ipsa aut ad doloribus dolorum.</h3>
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi maxime voluptas fugiat quia omnis, quo mollitia non quam quidem optio cum, numquam quae deserunt accusantium. Ipsa aut ad doloribus dolorum.</h3>
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi maxime voluptas fugiat quia omnis, quo mollitia non quam quidem optio cum, numquam quae deserunt accusantium. Ipsa aut ad doloribus dolorum.</h3>
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi maxime voluptas fugiat quia omnis, quo mollitia non quam quidem optio cum, numquam quae deserunt accusantium. Ipsa aut ad doloribus dolorum.</h3>
        </div>
        <div class="content-vertical"></div>
        <div class="content-image">
            <img src="../images/hanger.svg" alt="roupas">
        </div>
    </div>

</body>
</html>