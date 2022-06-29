<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Iconscout -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/registrar.css">
</head>
<body>
    <!-- NAVBAR -->
    <?php include_once '../html/header.html';?>


    <div class="body-container">
        <div class="container">
            <div class="forms">  
                <!-- Form Registro -->
                <div class="form signup">
                    <span class="title">Registrar-se</span>
    
                    <form action="../php/registrar.php" method="POST" >
                        <div class="input-field">
                            <input type="text" class="input-signup text" name="nome" placeholder="Insira seu nome" required autofocus>
                            <i class="uil uil-user icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" class="input-signup email" placeholder="Insira seu email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <!-- <input type="text" name="telefone" class="input-signup phone" onkeypress="mascaraDeTelefone(this.value)" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" placeholder="(99) 99999-9999" required> -->
                            <input type="text" name="telefone" id="telefone" class="input-signup phone" placeholder="(99) 99999-9999" onkeypress="mask(this,mphone)" />
                            <i class="uil uil-mobile-android icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="senha" class="password input-signup" placeholder="Insira sua senha" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="senha2" class="password input-signup" placeholder="Confirme sua senha" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
    
                        <div class="input-field button">
                            <input type="submit" class="input-signup submit" value="Registrar-se" required>
                        </div>
                    </form>
    
                    <div class="login-signup">
                        <span class="text">Já tem uma conta?
                            <a href="../html/login.php" class="text login-link">Fazer Login</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>