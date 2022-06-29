<?php             
    include_once "conexao.php";

	$codigo = $_GET['codigo'];

	$sql = "DELETE FROM produto ".
	"WHERE (idProduto=$codigo)";
	$result = mysqli_query($conn, $sql);

    if (! $result) {
        echo  "<script type ='text/javascript'>alert('N\u00e3o foi poss\u00edvel excluir os dados!');</script>";
    } else {
		echo  "<script type ='text/javascript'>alert('Dados excluidos!');</script>";
    } 

	// desconecta do banco
	mysqli_close($conn);
    header("Location: p_prod.php");
?>