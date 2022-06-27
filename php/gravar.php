<?php
include_once 'conexao.php';
$arquivo = $_FILES["arquivo"];



$nome_temporario=$_FILES["arquivo"]["tmp_name"];
$nome_real=$_FILES["arquivo"]["name"];

$nome_final = 3;
$ArqImp = "../centros/";
copy($nome_temporario,"../centros/$nome_final".".jpg");
// Codigo de inserção
$sql = "INSERT INTO `campanha_agasalho`.`centros` (`foto`, `nome`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `observacao`, `itens`, `meio_doacao`, `gerente`, `horario_abertura`, `horario_fechamento`) VALUES ('../centros/$nome_final', 'e', 'e', 'e', 'e', 'e', '1', 'e', 'e', 'e', '1', '15:00', '15:00');";

// Converte e Executa a query
$inserir = mysqli_query($conn, $sql);

// Resultado para o .html
if ($inserir) {
echo "Documento inserido com sucesso!";
?><img src="../centros/<?php echo $nome_final?>.jpg" alt="Minha Figura">
<?php
} else {
echo "Não foi possível inserir link, tente novamente. Se o erro persistir contate o Administrador do Sistema.";
// Exibe dados sobre o erro:
echo "Dados sobre o erro:";
}
?>
?>
