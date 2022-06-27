<?php
    session_start();
    include_once "conexao.php"; 

    // if(empty($_POST['email']) || empty($_POST['senha'])) {
    //     header('Location: ../php/dashboard.php');
    //     exit();
    // }

    $nome = $_POST['nome'];
    $email =  $_POST['email'];
    $telefone =  $_POST['telefone'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    if($senha!=$senha2){
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../html/login.php');
        exit();
    }
    echo $nome;

    $query = "select * from colaboradores where email = '{$email}' and senha = '{$senha}'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if($row == 0) {
        echo "<script>alert('sexooo')<script>";
        $sql = "insert into colaboradores (nome,email,senha,telefone,admin) values ('$nome','$email','$senha','$telefone',0)";
        $result = mysqli_query($conn, $sql);
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['senha'] = $senha;
        header('Location: dashboard.php');
    
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../html/login.php');
        exit();
    }

?>