<?php
    include('verifica_login.php');
    include_once('conexao.php')
?>

<?php 
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
    

$_SESSION['idC'] = $idC;
header("location: procurar.php");
?>