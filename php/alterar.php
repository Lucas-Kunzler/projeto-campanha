<?php
include('procurar.php');
include_once "conexao.php";
    
        $localhost = "localhost";
		$user = "root";
		$password = "12345";
		$banco = "campanha_agasalho";

		$conn = mysqli_connect($localhost, $user, $password, $banco);
        $nome = $_POST['nome'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $observacao = $_POST['observacao'];
        $itens = $_POST['itens'];
        $meio_doacao = $_POST['meio'];
        $gerente = $_POST['gerente'];
        $horario_abertura = $_POST['hab'];
        $horario_fechamento = $_POST['hfe'];
        $id_centro = $_POST['codigo'];
        $flroupas = $_POST['roupas'];
        $flcomidas = $_POST['comidas'];
        $flremedios = $_POST['remedios'];
        $flnolocal = $_POST['nolocal'];
        $flagenhorario = $_POST['agenhorario'];
        $flbuscamosvc = $_POST['buscamosvc'];
        $sql = "UPDATE `campanha_agasalho`.`centros` SET `foto` = '../centros/4', `nome` = '$nome', `estado` = '$estado', `cidade` = '$cidade', `bairro` = '$bairro', `rua` = '$rua', `numero` = '$numero', `observacao` = '$observacao', `meio_doacao` = '$meio_doacao', `gerente` = '2', `horario_abertura` = '23:00:00', `horario_fechamento` = '12:30:00', `roupa` = '$flroupas', `comida` = '$flcomidas', `remedio` = '$flremedios', `nolocal` = '$flnolocal', `agenhorario` = '$flagenhorario', `buscamosvc` = '$flbuscamosvc' WHERE (`idCentros` = '$id_centro')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>alert("Centro adicionado com sucesso!")</script>';
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }


?>