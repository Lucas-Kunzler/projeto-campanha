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
    <div class="navbar">
        <div class="logo">
            <a href="../html/"><i class="uil uil-adjust-circle"></i></a>
        </div>
        <div class="links">
            <div class="link">
                <a href="../html/index.html" class="a-link"><span class="text-link">Home</span></a>
            </div>
            <div class="link">
                <a href="../html/about.html" class="a-link"><span class="text-link">Sobre nós</span></a>
            </div>
            <div class="link dropdown">
                <a href="" class="a-link"><span class="text-link">Procurar</span></a>
                <div class="dropdown dropdown-content">
                    <a href="../php/procurar.php" class="a-link"><span class="text-link">Centros</span></a>
                    <a href="../php/p_prod.php" class="a-link"><span class="text-link">Itens</span></a>
                </div>
            </div>
            <div class="link">
                <a href="../html/login.php" class="a-link"><span class="text-link">Entrar</span></a>
            </div>
            <div class="link">
                <a href="../html/login.php" class="a-link"><span class="text-link-alt">Registrar</span></a>
            </div>
        </div>
    </div>

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

    <form action="p_prod.php"method="post">
        <div class="divBusca">
            <div class="input">
                <label>Nome:</label>
                <input type="text" class="input field" name="nome">
            </div>
            <div class="input">
                <label>Categoria:</label>
                <input type="text" class="input field" name="categoria">
            </div>
            <button>
                Pesquisar
                <i class="uil uil-search-alt"></i>
            </button>
        </div>
    </form>
    
    <?php
        teste();
        echo "</div>";

        function teste() {
        echo "<div class='consulta'>";
        $i = 0;
        include_once "conexao.php";

        if(isset($_POST['nome']) || isset($_POST['categoria'])){
            $nome = $_POST['nome'];
            $categoria = $_POST['categoria'];  
            $nome = $nome."%";
            $categoria = $categoria."%";  
            if(($nome!="") && ($categoria!="")){
                $sql = "SELECT * FROM produto where (categoria like '$categoria') and (nome like '$nome')";
            }
            else{
                $sql = "SELECT * FROM produto where (categoria like '$categoria') or (nome like '$nome')";
            }
        }

        
        else{
            $sql = "SELECT * FROM produto";

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
                    <th>Quantidade</th>
                    <th>Tamanho</th>
                    <th>Sexo</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Centro</th>
                    <th>Setor</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // verifica os registros retornados
        if($result){
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
                <tr>
                    <td class="table-cell"><?php echo $row[1];?></td>
                    <td class="table-cell"><?php echo $row[2];?></td>
                    <td class="table-cell"><?php echo $row[3];?></td>
                    <td class="table-cell"><?php echo $row[4];?></td>
                    <td class="table-cell"><?php echo $row[5];?></td>
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
                    <td class="table-cell"><?php echo $row[7];?></td>
                    <td class="table-cell"><?php echo $row[8];?></td>
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
    }
    echo "</div>"
    ?>

</body>
</html>