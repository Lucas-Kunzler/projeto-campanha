<?php
    include('verifica_login.php');
    include_once('conexao.php')
?>

<h2>Olá, <?php 
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$sql = "select idColaboradores, nome from colaboradores where email = '$email' and senha = '$senha'";
$result = mysqli_query($conn, $sql);
if (!$conn)
        {
            echo  "<script>alert('Não foi possível conectar ao Banco de Dados!');</script>";
            header('Location: p_prod.php');
        }

if($result){
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        $idC = $row[0];
        $nome = $row[1];
       }  
    }
            else{
                echo "result is empty";
            }
    
echo $nome;
echo "<br></br>id=";
$_SESSION['idC'] = $idC;
echo $_SESSION['idC'];
?></h2>
<h2><a href="logout.php">Sair</a></h2>
<a  onclick="return confirm('Tem certeza que deseja deletar este registro?')" href="excluirconta.php">Excluir</a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
            <span class="material-symbols-outlined"></span>
                <div class="logo-name">Campanha do Agasalho</div>
            </div>
            <i class="uil uil-draggabledots"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Colaboradores</span>
                </a>
            </li>
            <li>
                <a href="procurar.php">
                    <i class="uil uil-apps"></i>
                    <span class="link-name">Centros de Caridade</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="uil uil-box"></i>
                    <span class="link-name">Itens / Estoque</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="uil uil-file-alt"></i>
                    <span class="link-name">Changelog</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Configurações</span>
                </a>
            </li>
        </ul>
        <div class="profile-content">
            <div class="profile">
                <div class="profile-info">
                    <img src="" alt="">
                    <div class="name_centro">
                        <div class="name"></div>
                        <div class="centro"></div>
                    </div>
                </div>
                <i class="uil uil-signout"></i>
            </div>
        </div>
    </div>
</body>
</html>