<?php
include_once "conexao.php";
    
        $localhost = "localhost";
		$user = "root";
		$password = "12345";
		$banco = "campanha_agasalho";
        $item = $_POST['item'];
        $centro = $_POST['centro'];
        $setor = $_POST['setor'];
        $quant = $_POST['quant'];
        $tam = $_POST['tam'];
        
        $sexo = $_POST['sexo'];
        $descricao = $_POST['descricao'];
        $id_item = $_POST['id_item'];
        echo '<script>alert('.$centro; echo')</script>';
        $flroupas = empty($_POST['roupas'])?'N':'S';
        $flcomidas = empty($_POST['comidas'])?'N':'S';  
        $flremedios = empty($_POST['remedios'])?'N':'S';
		$conn = mysqli_connect($localhost, $user, $password, $banco);
        $sql = "UPDATE `campanha_agasalho`.`produto` SET `nome` = '$item', `qtde` = '$quant', `tamanho` = '$tam', `genero` = '$sexo', `descricao` = '$descricao', `roupa` = '$flroupas', `comida` = '$flcomidas', `remedio` = '$flremedios', `fkidcentro` = '$centro', `setor` = '$setor' WHERE (`idProduto` = '$id_item');";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>alert("Centro alterado com sucesso!")</script>';
            header("location: procurar.php");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            
        }


?>