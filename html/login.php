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
        <?php
            if(isset($_SESSION['nao_autenticado'])):
        ?>
            <div class="notification is-danger">
                <p>🚨ERRO: Usuário ou senha inválidos.🚨</p>
            </div>
        <?php
            endif;
            unset($_SESSION['nao_autenticado']);
        ?>
        
        <div class="container">
            <div class="forms">
                <!-- Form Login -->
                <div class="form login">
                    <span class="title">Entrar</span>
    
    
                    <form action="../php/login.php" method="POST">
                        <div class="input-field">
                            <input type="email" class="input-login email" name="email" placeholder="Insira seu email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password input-login" name="senha" placeholder="Insira sua senha" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
    
                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" class="input-login checkbox" id="logCheck">
                                <label for="logCheck" class="text">Salvar Login</label>
                            </div>
                        </div>
    
                        <div class="input-field button">
                            <input type="submit" class="input-login submit" value="Logar Agora" required>
                        </div>
                    </form>
    
                    <div class="login-signup">
                        <span class="text">Não é um colaborador?
                            <a href="registrar.php" class="text signup-link input-login">Registra-se agora</a>
                        </span>
                    </div>
                </div>
    

            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>