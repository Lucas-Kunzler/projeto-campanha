
<?php

    include('procurar.php');
    include_once "conexao.php";
    include('incluir_centro.php');
    $localhost = "localhost";
    $user = "root";
    $password = "12345";
    $banco = "campanha_agasalho";
    
    $conn = mysqli_connect($localhost, $user, $password, $banco);
    $arquivo = $_FILES["arquivo"];
    $nome_temporario=$_FILES["arquivo"]["tmp_name"];
    $nome_real=$_FILES["arquivo"]["name"];
    
    $extensao = explode('.', $_FILES['arquivo']['name']);
    $extensao = strtolower(end($extensao)); // pega a extensão do arquivo
    $nome_final = rand().".".$extensao;
    while(file_exists("../centros/$nome_final")){
        $nome_final = rand();
        echo "cringe";
    }
    $sql1 = "select * from centros where foto like '../centros/$nome_final'";
    $result = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result, MYSQLI_NUM);
    

        $ArqImp = "../centros/";
        copy($nome_temporario,"../centros/$nome_final");
        
                $nome = $_POST['nome'];
                $estado = $_POST['estado'];
                $cidade = $_POST['cidade'];
                $bairro = $_POST['bairro'];
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $observacao = $_POST['observacao'];
                $flroupas = empty($_POST['roupas'])?'N':'S';
                $flcomidas = empty($_POST['comidas'])?'N':'S';  
                $flremedios = empty($_POST['remedios'])?'N':'S';

                $flnolocal = empty($_POST['nolocal'])?'N':'S';
                $flagenhorario = empty($_POST['agenhorario'])?'N':'S';  
                $flbuscamospravc = empty($_POST['buscamospravc'])?'N':'S';
                // $meio_doacao = $_POST['meio'];
                

                $gerente = $_POST['gerente'];
                $horario_abertura = $_POST['hab'];
                $horario_fechamento = $_POST['hfe'];
                $sql = "INSERT INTO `campanha_agasalho`.`centros` (`foto`, `nome`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `observacao`, `roupa`,`comida`,`remedio`, `nolocal`,`agenhorario`, `buscamosvc`,`meio_doacao`, `gerente`, `horario_abertura`, `horario_fechamento`) VALUES ('../centros/$nome_final', '$nome', '$estado', '$cidade', '$bairro', '$rua', '$numero', '$observacao', '$flroupas','$flcomidas','$flremedios', '$flnolocal','$flagenhorario','$flbuscamospravc','cringe', '$gerente', '$horario_abertura', '$horario_fechamento');";
                $result = mysqli_query($conn, $sql);
                if($result){
                    
                    echo '<script>alert("Centro adicionado com sucesso!")</script>';
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                mysqli_close($conn);
        
?>