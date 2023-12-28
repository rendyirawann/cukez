<?php
require 'base/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?> - Login Page</title>

    <!-- Favicons -->
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="icon">
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="apple-touch-icon">
    <!-- Css Custom -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">

    <!-- Css Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/b7615a79ce.js" crossorigin="anonymous"></script>

    <!-- Boxicons -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/boxicons/css/boxicons.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Sign in here</h3>
        <form action="cek_login.php" method="POST">
            <div class="inputBox">
            <input id="email" type="email" name="email" placeholder="Email">
                <input id="username" type="text" name="username" placeholder="Username">
            <input id="password" type="password" name="password" placeholder="Password"> </div>
            <button class="btn-login btn-lg btn-block" type="submit" name="submit" type="button">Login</button>
        </form> 
        <div class="text-center">
            <a class="sign-1 me-1" href="signup.php">Sign-Up</a>
            <a href="index.php" class="mt-2 me-3">&#8592;back to index</a>
        </div>
        
    </div>
    
</body>
</html>