<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/incluir_item.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script type="text/javascript">
        function Nova()
        {
            location.href=" ../html/index.php"
        }
    </script>
</head>
<body onload="SexoChange()">
<?php
session_start();
            if(isset($_SESSION['nao_autenticado'])):
        ?>
            <div class="notification is-danger">
                <p>🚨ERRO: Senha inválida.🚨</p>
            </div>
        <?php
            endif;
            unset($_SESSION['nao_autenticado']);

    if(isset($_SESSION['idC'])){
        include_once '../html/header1.php';
        $idC = $_SESSION['idC'];
    }
    else{
        include_once '../html/header.html';
        $idC=null;
    }
    ?>
    <?php

    include_once "conexao.php";
    $idC = $_SESSION['idC'];
    $sql = "SELECT * FROM colaboradores where idColaboradores = $idC";
    $result = mysqli_query($conn, $sql);
    if (!$conn)
    {
        echo  "<script>alert('Não foi possível conectar ao Banco de Dados!');</script>";
        header('Location: p_prod.php');
    }
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    ?>
    <div class="centro-popup">
        <div class="popup">
            <form action="alterar_p.php" method="post" enctype="multipart/form-data">
                <h1>Alterar Perfil</h1>
                <hr>
                <div class="form-divs">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="nome" placeholder=" " value="<?php echo $row[1]?>"required>
                        <label class="form-label">Nome</label>
                    </div>
                    <div class="form-div">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="email" placeholder=" " value="<?php echo $row[2]?>"required>
                        <label class="form-label">Email</label>
                    </div>
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="telefone" placeholder=" " value="<?php echo $row[4]?>"required>
                        <label class="form-label">Telefone</label>
                    </div>
                    <div class="form-div nome">
                        <input type="password" class="input-field" name="senha" placeholder=" " value=""required>
                        <label class="form-label">Senha atual:</label>
                    </div>
                </div>
                    </div>
                        <div class="buttons">
                            <input type="submit" class="button button2" value="Salvar" required>
                            <input type="button" class="button button-alt" value="Cancelar" onClick="Nova()">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 
