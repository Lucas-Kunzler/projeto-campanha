<?php
include_once "conexao.php";
        $localhost = "localhost";
		$user = "root";
		$password = "12345";
		$banco = "campanha_agasalho";
        $nome = $_POST['nome'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $observacao = $_POST['observacao'];
        $gerente = $_POST['gerente'];
        $horario_abertura = $_POST['hab'];
        $horario_fechamento = $_POST['hfe'];
        $id_centro = $_POST['codigo'];
        $flroupas = empty($_POST['roupas'])?'N':'S';
        $flcomidas = empty($_POST['comidas'])?'N':'S';  
        $flremedios = empty($_POST['remedios'])?'N':'S';
        $flnolocal = empty($_POST['nolocal'])?'N':'S';
        $flagenhorario = empty($_POST['agenhorario'])?'N':'S';  
        $flbuscamospravc = empty($_POST['buscamosvc'])?'N':'S';
		$conn = mysqli_connect($localhost, $user, $password, $banco);
        $sql = "";
        if (empty($_FILES['arquivo']['size']) != true){        
            $sql1 = "select foto from centros where idCentros = $id_centro";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
            if (!unlink($row1[0]))
            {
                echo ("Erro ao deletar $arquivo");
            }
            else
            {
                echo ("Deletado $arquivo com sucesso!");
            }
            
            $arquivo = $_FILES["arquivo"];
            $nome_temporario=$_FILES["arquivo"]["tmp_name"];
            $nome_real=$_FILES["arquivo"]["name"];
            
            $extensao = explode('.', $_FILES['arquivo']['name']);
            $extensao = strtolower(end($extensao)); // pega a extensão do arquivo
            $nome_final = rand().".".$extensao;
            $ArqImp = "../centros/";
            
            while(file_exists("../centros/$nome_final")){
                $nome_final = rand();
                echo "cringe";
            }    
            copy($nome_temporario,"../centros/$nome_final");
            $sql = "UPDATE `campanha_agasalho`.`centros` SET `foto` = '../centros/$nome_final', `nome` = '$nome', `estado` = '$estado', `cidade` = '$cidade', `bairro` = '$bairro', `rua` = '$rua', `numero` = '$numero', `observacao` = '$observacao', `gerente` = '$gerente', `horario_abertura` = '$horario_abertura', `horario_fechamento` = '$horario_fechamento', `roupa` = '$flroupas', `comida` = '$flcomidas', `remedio` = '$flremedios', `nolocal` = '$flnolocal', `agenhorario` = '$flagenhorario', `buscamosvc` = '$flbuscamospravc' WHERE (`idCentros` = '$id_centro')";
        
    }
        else{
            
            $sql = "UPDATE `campanha_agasalho`.`centros` SET `nome` = '$nome', `estado` = '$estado', `cidade` = '$cidade', `bairro` = '$bairro', `rua` = '$rua', `numero` = '$numero', `observacao` = '$observacao', `gerente` = '$gerente', `horario_abertura` = '$horario_abertura', `horario_fechamento` = '$horario_fechamento', `roupa` = '$flroupas', `comida` = '$flcomidas', `remedio` = '$flremedios', `nolocal` = '$flnolocal', `agenhorario` = '$flagenhorario', `buscamosvc` = '$flbuscamospravc' WHERE (`idCentros` = '$id_centro')";
        }
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>alert("Centro alterado com sucesso!")</script>';
            header("location: procurar.php");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }


?>