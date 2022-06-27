<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/procurar.css">
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
                <a href="" class="a-link">
                    <span class="text-link">Procurar</span>
                </a>
                <div class="dropdown dropdown-content">
                    <a href="../php/procurar.php" class="a-link"><span class="text-link">Centros</span></a>
                    <a href="../php/p_prod.php" class="a-link"><span class="text-link">Itens</span></a>
                </div>
            </div>
            <div class="link">
                <a href="../html/login.php" class="a-link"><span class="text-link">Entrar</span></a>
            </div>
            <div class="link-alt">
                <a href="../html/login.php" class="a-link"><span class="text-link-alt">Registrar</span></a>
            </div>
        </div>
    </div>
    

    </div>
    <a href="incluir_centro.php">
        <div class='button-sqr button-add'>
            <i class="uil uil-plus"></i>
            <div class="text-button-add">
                <p style="white-space: nowrap;">
                    Adicionar Centro
                </p>
            </div>
        </div>
    </a>
    <?php
        teste();
        echo "</div>";

        function teste() {
        echo "<div class='consulta' colspan='2'>";
        $i = 0;
        include_once "conexao.php";

        if(isset($_POST['uf']) || isset($_POST['cidade'])){
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade']; 
            $uf = $uf."%";
            $cidade = $cidade."%";
            if(($uf!="") && ($cidade!="")){
                 
                $sql = "SELECT * FROM centros where (cidade like '$cidade') and (estado like '$uf')";

            }
            else{
                $sql = "SELECT * FROM centros where (cidade like '$cidade') or (estado like '$uf')";
            }
        }

        else{
            $sql = "SELECT * FROM centros";
        }
    
        
        $result = mysqli_query($conn, $sql);
        if (!$conn)
        {
            echo  "<script>alert('Não foi possível conectar ao Banco de Dados!');</script>";
            header('Location: p_prod.php');
        }
        

    ?>

<form action="procurar.php" method="post" class="form">
        <div class="divBusca">
            <div class="input">
                <label>UF:</label>
                <input type="text" class="input field" name="uf">
            </div>
            <div class="input">
                <label>Cidade:</label>
                <input type="text" class="input field" name="cidade">
            </div>
            <button>
                Pesquisar
                <i class="uil uil-search-alt"></i>
            </button>
        </div>
    </form>

    <div class="centros" colspan="2">
        <?php
        // verifica os registros retornados
        if($result){
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
            <div class="card">
                <div class="box">
                    <div class="box-muni" data-name="<?php $row[0];?>">
                        <div class="nome-muni">
                            <?php echo $row[2];?>
                        </div>
                        <hr>
                        <?php echo " <input type='hidden' id='custId' name='custId' value='$row[0]'>";
                        
                        $idcentro = $row[0];
                        ?>
                        <div class="muni">
                            <div class="image">
                                <i class="uil uil-building"></i>
                                <?php echo $row[1]?>
                            </div>
                            <div class="infos">
                                <div class="infos-infos">
                                    <label class="subtitle">Endereço</label>
            
                                    <div class="info">
                                        <?php echo $row[3];?>
                                         - <?php echo $row[4];?>
                                    </div>
                                    <div class="info">
                                        <?php echo $row[5];?>
                                    </div>
                                    <div class="info">
                                        Rua <?php echo $row[6];?>
                                    </div>
                                    <div class="info">
                                        Número: <?php echo $row[7];?>
                                    </div>
                                    <div class="info">
                                        Observação: <?php echo $row[8];
                                        $observacao=$row[8]?>
                                    </div>
                                </div>
                            </div>
                            <div class="infos">
                                <div class="infos-infos">
                                    <label class="subtitle">Informações de Doação</label>
            
                                    <div class="info">
                                        Itens: <?php echo $row[9];?>
                                    </div>
                                    <div class="info">
                                        Meios de doação: <?php echo $row[10];?>
                                    </div>
                                    <div class="info">
                                        Gerente: <?php 
                                        
                                        $sql1 = "SELECT Nome,idColaboradores from colaboradores where idColaboradores = $row[11]";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
        
                                        echo $row1[0];?>
                                    </div>
                                    <div class="info">
                                        <?php echo substr($row[12], 0, -3);?>
                                        -
                                        <?php echo substr($row[13], 0, -3);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="alterar_centro.php?codigo=<?php echo $row[0]?>&nome=<?php echo $row[2]?>&estado=<?php echo $row[3]?>&cidade=<?php echo $row[4]?>&bairro=<?php echo $row[5]?>&rua=<?php echo $row[6]?>&numero=<?php echo $row[7]?>&observacoes=<?php echo $row[8]?>&roupas=<?php echo $row[13]?>&comidas=<?php echo $row[14]?>&remedios=<?php echo $row[15]?>&nolocal=<?php echo $row[16]?>&agenhorario=<?php echo $row[17]?>&buscamosvc=<?php echo $row[18]?>&meio=<?php echo $row[15]?>&gerente=<?php echo $row[16]?>&abertura=<?php echo $row[11]?>&fechamento=<?php echo $row[12]?>&gerente=<?php echo $row1[1]?>">
                                <div class="button-edit button button-alt">
                                    <i class="uil uil-pen"></i>
                                    Editar
                                </div>
                            </a>
                            <a href="excluircentro.php?codigo=<?php echo $row[0];?>">
                                <div class="button-delete button button-alt">
                                    <i class="uil uil-trash-alt"></i>
                                    Excluir
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="box-behind">
        
                    </div>
                </div>
            </div>
        <?php
            }  
            } else {
                echo "result is empty";
            }
        ?>
    </div>
    </table>
    <?php mysqli_close($conn);
    }
    echo "</div>"
    ?>
    <script src="../js/procurar.js"></script>
</body>
</html>