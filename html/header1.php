<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../css/header.css">
    <script src="header.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="../html/index.php"><i class="uil uil-adjust-circle"></i></a>
        </div>
        <div class="menu">
            <button id ="btn-mobile">menu</button>
            <div class="links" id="links">
                <div class="link">
                    <a href="../html/index.php" class="a-link"><span class="text-link">Home</span></a>
                </div>
                <div class="link">
                    <a href="../html/about.php" class="a-link"><span class="text-link">Sobre nós</span></a>
                </div>
                <div class="link dropdown">
                    <a href="" class="a-link">
                        <span class="text-link">Procurar</span>
                    </a>
                    <div class="dropdown dropdown-content">
                        <a href="../php/procurar.php" class="a-link"><span class="text-link">Centros</span></a>
                        <a href="../php/p_prod.php" class="a-link"><span class="text-link">Itens</span></a>
                    </div>
                </div>
                <div class="link">
                    <a href="../php/logout.php" class="a-link"><span class="text-link"><?php 
                        $nome = $_SESSION['nome'];
                        echo $nome?></span></a>
                </div>
                <div class="link">
                    <a href="../php/editar_perfil.php" class="a-link"><span class="text-link"><?php 
                        $nome = $_SESSION['nome'];
                        echo "Editar"?></span></a>
                </div>
                <div class="link">
                    <a href="../php/logout.php" class="a-link"><span class="text-link">Sair</span></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>