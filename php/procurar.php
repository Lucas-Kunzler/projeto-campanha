<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/procurar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/script.js" defer></script>
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
    <a href="incluir_centro.php?idcolab=<?php echo $idC?>">
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
    }
    else{
        include_once '../html/header.html';
        $idC=null;
    }
    ?>
    <?php
        
        teste($idC);
        echo "</div>";
        function teste($idC) {
        echo "<div class='consulta' colspan='2'>";
        $i = 0;
        include_once "conexao.php";

        if(isset($_POST['uf']) || isset($_POST['cidade'])){
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade']; 
            $uf = $uf."%";
            $cidade = $cidade."%";
            if(($uf!="") && ($cidade!="")){
                if(isset($idC)){
                    $sql = "SELECT * FROM centros where (cidade like '$cidade') and (estado like '$uf') and gerente=$idC union SELECT * FROM centros where (cidade like '$cidade') and (estado like '$uf') and gerente!=$idC";
                }
                else{
                    $sql = "SELECT * FROM centros where (cidade like '$cidade') and (estado like '$uf')";
                }

            }

            else{
                if(isset($idC)){
                    $sql = "SELECT * FROM centros where (cidade like '$cidade') or (estado like '$uf') and gerente=$idC union SELECT * FROM centros where (cidade like '$cidade') or (estado like '$uf') gerente!=$idC";
                }
                else{
                    $sql = "SELECT * FROM centros where (cidade like '$cidade') or (estado like '$uf')";
                }

            }
        }

        else{
            if(isset($idC)){
                $sql = "SELECT * FROM centros where gerente=$idC union SELECT * FROM centros where gerente!=$idC";
            }
            else{
                $sql = "SELECT * FROM centros";
            }
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
                                <?php
                                    if(empty($row[1])){
                                ?>
                                        <i class="uil uil-building"></i>
                                <?php
                                    } else {
                                ?>
                                        <img src="<?php echo $row[1]?>" alt="Foto do Centro" class="foto-centro">
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="infos">
                                <div class="infos-end">
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
                                <div class="infos-doa">
                                    <label class="subtitle">Informações de Doação</label>
            
                                    <div class="info itens">
                                        Itens:&nbsp;<?php 
                                        $itens2 = "";
                                        if($row[12]=="S"){
                                            // $itens2 = "Roupas";
                                            echo "<div class='item-class'>";
                                            echo "<div class='roupa'>Roupa 👚</div>";
                                            echo "</div>";
                                        }
                                        if($row[13]=="S"){
                                            // $itens2 = $itens2."Comidas";
                                            echo "<div class='item-class'>";
                                            echo "<div class='comida'>Comida 🍕</div>";
                                            echo "</div>";
                                        }
                                        if($row[14]=="S"){
                                            // $itens2 = $itens2."Remédios";
                                            echo "<div class='item-class'>";
                                            echo "<div class='remedio'>Remédio 💊</div>";
                                            echo "</div>";
                                        }
                                        echo $itens2;
                                        ?>
                                    </div>
                                    <div class="info itens">
                                        Meios de doação: <?php 
                                        $meioss="";
                                        if($row[15]=="S"){
                                            // $meioss = "No local";
                                            echo "<div class='item-class'>";
                                            echo "<div class='nolocal'>No Local 🚩</div>";
                                            echo "</div>";
                                        }
                                        if($row[16]=="S"){
                                            // $meioss = $meioss."Agendar horário";
                                            echo "<div class='item-class'>";
                                            echo "<div class='agenhorario'>Agen. Horário ⏰</div>";
                                            echo "</div>";
                                        }
                                        if($row[17]=="S"){
                                            // $meioss = $meioss."Buscamos pra você";
                                            echo "<div class='item-class'>";
                                            echo "<div class='delivery'>Buscamos 🚚</div>";
                                            echo "</div>";
                                        }
                                        echo $meioss;
                                        ?>
                                    </div>
                                    <div class="info">
                                        Gerente: <?php 
                                        
                                        $sql1 = "SELECT nome,telefone,idColaboradores from colaboradores where idColaboradores = $row[9]";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
        
                                        echo $row1[0];?>
                                        -
                                        <?php echo $row1[1];?>
                                    </div>
                                    <div class="info">
                                        <?php echo substr($row[10], 0, -3);?>
                                        -
                                        <?php echo substr($row[11], 0, -3);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['idC'])){
                            if($_SESSION['idC'] == $row[9]){
                        ?>
                                <div class="buttons">
                                    <a href="alterar_centro.php?codigo=<?php echo $row[0]?>">
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
                            <?php
                            }
                        }
                    ?>
                </div>
                <div class="box-behind"></div>
            </div>
            </div>
        <?php
            }  
        }
        ?>
    </div>
    </table>
    <?php mysqli_close($conn);
        }
    echo "</div>"
    ?>
    <!-- <div class="preview-geral">
        <div class="preview">
            <div>
                <div class="preview-image" onclick="Preview">
                    <div class="fechar">
                        <i class="uil uil-times"></i>
                    </div>
                    <img src="<?php echo $row[1]?>" alt="">
                </div>
            </div>
            <div class="preview-content">

            </div>
        </div>
    </div> -->
    <script src="../js/procurar.js"></script>
</body>
</html>