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

		$conn = mysqli_connect($localhost, $user, $password, $banco);
        $sql = "UPDATE `campanha_agasalho`.`produto` SET `nome` = '$item', `qtde` = '$quant', `tamanho` = '$tam', `genero` = '$sexo', `descricao` = '$descricao', `roupa` = '$flroupas', `comida` = '$flcomidas', `remedio` = '$flremedios', `fkidcentro` = '$centro', `setor` = '$setor' WHERE (`idProduto` = '$id_item');";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>alert("Centro alterado com sucesso!")</script>';
            header("location: p_prod.php");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

        }


?> 
