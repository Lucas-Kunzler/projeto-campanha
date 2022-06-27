<?php
include('dashboard.php');
include_once 'conexao.php';
    echo $email;
    echo $idC;
    
    $sql = "delete from colaboradores where idColaboradores = '$idC'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Records were deleted successfully.")</script>';
        header('Location: ../html/index.html');
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }


?>