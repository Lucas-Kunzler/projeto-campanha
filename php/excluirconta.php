<?php
include_once 'conexao.php';
session_start();
    $idC = $_SESSION['idC'];
    $sql1 = "select idProduto from produto where fkidcentro in (select idCentros from centros where gerente = $idC)";
    $result1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)){
        $sql2 = "delete from produto where idProduto = $row1[0]";
        $result2 = mysqli_query($conn, $sql2);
        echo $row1[0];
        if (! $result2) {
            echo  "N\u00e3o foi poss\u00edvel excluir os dados!";
        } 
        else{
            echo  "Dados excluidos";
        }
    }
    $sql3 = "delete from centros where gerente = '$idC'";
    $result3 = mysqli_query($conn, $sql3);
    if (! $result3) {
        echo  "N\u00e3o foi poss\u00edvel excluir os dados!";
    } 
    else{
        echo  "Dados excluidos";
    }
    $sql4 = "delete from colaboradores where idColaboradores = '$idC'";
    $result4 = mysqli_query($conn, $sql4);
    if (! $result4) {
        echo  "N\u00e3o foi poss\u00edvel excluir os dados!";
    } 
    else{
        echo  "Dados excluidos";
    }
        header('Location: logout.php');

?>