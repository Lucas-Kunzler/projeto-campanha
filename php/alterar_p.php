<?php
include_once "conexao.php";
        session_start();    
        $localhost = "localhost";
		$user = "root";
		$password = "12345";
		$banco = "campanha_agasalho";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $id_user = $_SESSION['idC'];
		$conn = mysqli_connect($localhost, $user, $password, $banco);
        $sql1 = "select senha from colaboradores where idColaboradores = $id_user";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
        if($row1[0]==$senha){

            $sql = "UPDATE `campanha_agasalho`.`colaboradores` SET `Nome` = '$nome', `email` = '$email', `telefone` = '$telefone' WHERE (`idColaboradores` = '$id_user')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("Centro alterado com sucesso!")</script>';
                
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                
            }
            header('Location: editar_perfil.php');
        }

        else{
            $_SESSION['nao_autenticado'] = true;
            header('Location: editar_perfil.php');
            exit();
        }
?>