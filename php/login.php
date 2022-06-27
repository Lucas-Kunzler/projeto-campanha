<?php
    session_start();
    include('conexao.php');

    if(empty($_POST['email']) || empty($_POST['senha'])) {
        header('Location: ../php/dashboard.php');
        exit();
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $query = "select * from colaboradores where email = '{$email}' and senha = '{$senha}'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if($row == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: dashboard.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../html/login.php');
        exit();
    }
?>