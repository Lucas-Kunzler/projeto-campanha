<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/p_prod.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <title>Doações</title>
</head>

<body>
    
    <?php
    session_start();
    
    if(isset($_SESSION['idC'])){
        include_once '../html/header1.php';
        $idC = $_SESSION['idC'];
    ?>
        <a href="incluir_item.php">
            <div class='button-sqr button-add'>
                <i class="uil uil-plus"></i>
                <div class="text-button-add">
                    <p style="white-space: nowrap;">
                        Adicionar Item
                    </p>
                </div>
            </div>
        </a>
<?php
        }
        else{
            include_once '../html/header.html';
            $idC=null;
        }

        
?>
    <form action="p_prod.php"method="post">
        <div class="divBusca">
            <div class="input">
                <label>Nome:</label>
                <input type="text" class="input field" name="nome">
            </div>
            <div class="input">
                <label>Categoria:</label>
                <select name="categoria" id="categoria" class="select input field">
                        <option disabled selected value="empty">Selecione</option>
                        <option value="roupa">Roupas</option>
                        <option value="comida">Comidas</option>
                        <option value="remedio">Remédios</option>
                </select>
            </div>
            <div class="input">
                <label>Centro:</label>
                <select name="centro" id="centro" class="select input field">
                        <option disabled selected>Selecione</option>
                        <?php 
                        include_once "conexao.php";
                        $sql1 = "select idCentros, nome from centros group by idCentros";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)){
                                ?>
                                <option value="<?php echo "$row1[0]";?>"><?php echo "$row1[1]";?></option>
                                <?php  
                                }
                                ?>
                </select>
            </div>
            <button>
                Pesquisar
                <i class="uil uil-search-alt"></i>
            </button>
        </div>
    </form>
    
    <?php
        
        echo "</div>";
        echo "<div class='consulta'>";
        $sql = "SELECT * FROM produto where";
        $categoria = "";
        $centro = "";
        $nome = "";
        
        if(isset($_POST['nome']) || isset($_POST['categoria'])|| isset($_POST['centro'])){
            if(isset($_POST['categoria'])){
                $categoria = $_POST['categoria'];  
                $sql = $sql."($categoria like 'S')";
            }
            if(isset($_POST['centro'])){
                $centro = $_POST['centro'];
                if(isset($_POST['categoria'])){
                    $sql = $sql."and";
                }
               
                $sql = $sql."(fkidcentro = $centro)"; 
                
                
            }
            if(isset($_POST['nome'])){
                $nome = $_POST['nome']."%";
                if(isset($_POST['categoria']) || isset($_POST['centro'])){
                    $sql = $sql."and";
                }
                $sql = $sql."(nome like '$nome')"; 
            }
            // $categoria = $categoria."%";  
            // $centro = $centro."%";  
            $sql = $sql."order by fkidcentro";
            $sql1 = "select idCentros, nome from centros group by idCentros";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
        }
        else{
            $sql = "SELECT * FROM produto order by fkidcentro";

        }

        $result = mysqli_query($conn, $sql);
        if (!$conn)
        {
            echo  "<script>alert('Não foi possível conectar ao Banco de Dados!');</script>";
            header('Location: p_prod.php');
        }

    ?>
    <div class="table-itens">
        <table class="table">
            <thead>
                <tr class="thead">
                    <th>Item</th>
                    <th>Centro</th>
                    <th>Setor</th>
                    <th>Quantidade</th>
                    <th>Tamanho</th>
                    <th>Sexo</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    
                    
                </tr>
            </thead>
            <tbody>
        <?php
        // verifica os registros retornados
        if($result){
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                $sql1 = "select * from centros where idCentros = $row[9] union select * from centros where idCentros != $row[9]";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
                ?>
                <tr>
                    <td class="table-cell item">
                        <div class="-table-item">
                            <?php echo $row[1];?>
                        </div>
                        <?php
                        
                        if(($row1[9]==$idC)){
                            
                        ?>
                        <div class="buttons">
                            <a href="alterar_item.php?codigo=<?php echo $row[0]?>&idcentro=<?php echo "$row1[0]";?>">
                                <div class="button-edit button button-alt">
                                    <i class="uil uil-pen"></i>
                                </div>
                            </a>
                            <a href="excluir_item.php?codigo=<?php echo $row[0];?>">
                                <div class="button-delete button button-alt">
                                    <i class="uil uil-trash-alt"></i>
                                </div>
                            </a>
                        </div>
                     <?php   
                    }
                    ?>
                    </td>
                    <td class="table-cell"><?php echo $row1[2];?></td>
                    <td class="table-cell"><?php echo $row[10];?></td>
                    <td class="table-cell"><?php echo $row[2];?></td>
                    <td class="table-cell"><?php echo $row[3];?></td>
                    <td class="table-cell"><?php echo $row[4];?></td>   
                    <td class="table-cell">
                        <?php
                            if($row[6] == 'S'){
                                echo "<div class='item-class'>";
                                echo "<div class='roupa'>Roupa 👚</div>";
                                echo "</div>";
                            };
                        ?>
                        <?php
                            if($row[7] == 'S'){
                                echo "<div class='item-class'>";
                                echo "<div class='comida'>Comida 🍕</div>";
                                echo "</div>";
                            };
                        ?>
                        <?php
                            if($row[8] == 'S'){
                                echo "<div class='item-class'>";
                                echo "<div class='remedio'>Remédio 💊</div>";
                                echo "</div>";
                            };
                        ?>
                    </td>
                    <td class="table-cell"><?php echo $row[5];?></td>   
                </tr>
                <?php
                }  
        }
                else{
                    echo "result is empty";
                }
        
    
        ?>
            </tbody>
        </table>
    </div>
    <?php mysqli_close($conn);
    
    echo "</div>"
    ?>

</body>
</html>