
<?php
    include_once "conexao.php";
    
    $localhost = "localhost";
    $user = "root";
    $password = "12345";
    $banco = "campanha_agasalho";
    
    $conn = mysqli_connect($localhost, $user, $password, $banco);


        $item = $_POST['item'];
        $centro = $_POST['centro'];
        $setor = $_POST['setor'];
        $quant = $_POST['quant'];
        $tam = $_POST['tam'];
        $sexo = $_POST['sexo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $fkidcentro = $_POST['centro'];
        $roupas = "";
        $comidas = "";
        $remedios = "";
        if($categoria=="roupa"){
            $roupas = "S";
            $comidas = "N";
            $remedios = "N";
        }
        else if($categoria=="comida"){
            $roupas = "N";
            $comidas = "S";
            $remedios = "N";
        }
        else{
            $roupas = "N";
            $comidas = "N";
            $remedios = "S";
        }
        $sql = "INSERT INTO `campanha_agasalho`.`produto` (`nome`, `qtde`, `tamanho`, `genero`, `descricao`, `roupa`, `comida`, `remedio`, `fkidcentro`, `setor`) VALUES ('$item', '$quant', '$tam', '$sexo', '$descricao', '$roupas', '$comidas', '$remedios', '$fkidcentro', '$setor');";
        $result = mysqli_query($conn, $sql);
        if($result){
            
            echo '<script>alert("Item adicionado com sucesso!")</script>';
            
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        header("location: p_prod.php");
        mysqli_close($conn);
        
?>