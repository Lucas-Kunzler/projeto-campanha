
<?php
    include_once "conexao.php";
    
    $localhost = "localhost";
    $user = "root";
    $password = "12345";
    $banco = "campanha_agasalho";
    
    $conn = mysqli_connect($localhost, $user, $password, $banco);


        $item = $_POST['item'];
        $setor = $_POST['setor'];
        $quant = $_POST['quant'];
        $tam = $_POST['tam'];
        $sexo = $_POST['sexo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $fkidcentro = $_POST['centro'];
        $categoria = $_POST['categoria'];
        $flroupas ="";
        $flcomidas = "";
        $flremedios = "";
        if($categoria=="roupas"){
            $flroupas ="S";
            $flcomidas = "N";
            $flremedios = "N";
        }
        else if($categoria=="comidas"){
            $flroupas ="N";
            $flcomidas = "S";
            $flremedios = "N";
        }
        else{
            $flroupas ="N";
            $flcomidas = "N";
            $flremedios = "S";
        }
        $sql = "INSERT INTO `campanha_agasalho`.`produto` (`nome`, `qtde`, `tamanho`, `genero`, `descricao`, `roupa`, `comida`, `remedio`, `fkidcentro`, `setor`) VALUES ('$item', '$quant', '$tam', '$sexo', '$descricao', '$flroupas', '$flcomidas', '$flremedios', '$fkidcentro', '$setor');";
        $result = mysqli_query($conn, $sql);
        if($result){
            
            echo '<script>alert("Item adicionado com sucesso!")</script>';
            
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            
        }
        header("location: p_prod.php");
        mysqli_close($conn);
        
?>