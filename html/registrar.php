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
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>



    <!-- NAVBAR -->
    <div class="navbar">
        <div class="logo">
            <a href="../html/"><i class="uil uil-adjust-circle"></i></a>
        </div>
        <div class="links">
            <div class="link">
                <a href="about.html" class="a-link"><span class="text-link">Sobre nós</span></a>
            </div>
            <div class="link dropdown">
                <a href="" class="a-link"><span class="text-link">Procurar</span></a>
                <div class="dropdown dropdown-content">
                    <a href="../php/procurar.php" class="a-link"><span class="text-link">Centros</span></a>
                    <a href="../php/p_prod.php" class="a-link"><span class="text-link">Itens</span></a>
                </div>
            </div>
            <div class="link">
                <a href="../html/login.php" class="a-link"><span class="text-link">Entrar</span></a>
            </div>
            <div class="link">
                <a href="../html/login.php" class="a-link"><span class="text-link-alt">Registrar</span></a>
            </div>
        </div>
    </div>


    <div class="body-container">
        <div class="container">
            <div class="forms">  
                <!-- Form Registro -->
                <div class="form login">
                    <span class="title">Registrar</span>
    
                    <form action="../php/registrar.php" method="POST" >
                        <div class="input-field">
                            <input type="text" class="input-signup text" name="nome" placeholder="Insira seu nome" required>
                            <i class="uil uil-user icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" class="input-signup email" placeholder="Insira seu email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="tel" name="telefone" class="input-signup email" placeholder="Insira seu número" required>
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
                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" class="input-signup checkbox" id="logCheck">
                                <label for="logCheck" class="text">Salvar Login</label>
                            </div>
    
                            <a href="#" class="text input-signup">Esqueceu a senha?</a>
                        </div>
    
                        <div class="input-field button">
                            <input type="submit" class="input-signup submit" value="Registrar-se" required>
                        </div>
                    </form>
    
                    <div class="login-signup">
                        <span class="text">Não é um colaborador?
                            <a href="#" class="text login-link">Registra-se agora</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>