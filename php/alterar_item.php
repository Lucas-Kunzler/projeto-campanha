<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/incluir_item.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script type="text/javascript">
        function Nova()
        {
            location.href=" p_prod.php"
        }
    </script>
</head>
<body onload="SexoChange()">
    
    <?php
    session_start();
    if(isset($_SESSION['idC'])){
        include_once '../html/header1.php';
        $idC = $_SESSION['idC'];
    }
    else{
        include_once '../html/header.html';
        $idC=null;
    }

    include_once "conexao.php";
    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM produto where idProduto = $codigo";
    $result = mysqli_query($conn, $sql);
    if (!$conn)
    {
        echo  "<script>alert('Não foi possível conectar ao Banco de Dados!');</script>";
        header('Location: p_prod.php');
    }
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    $gerente = $row[9];
    ?>
    <div class="centro-popup">
        <div class="popup">
            <form action="alterar_i.php" method="post" enctype="multipart/form-data">
                <h1>Alterar Item</h1>
                <hr>
                <div class="form-divs">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="item" placeholder=" " value="<?php echo $row[1]?>"required>
                        <label class="form-label">Item</label>
                    </div>
                    <div class="form-div">
                        <select name="centro" id="centro" class="select input-field">
                    <?php
                    include_once "conexao.php";
                    session_start();
                                $idC = $_SESSION['idC'];
                                $idcentros=$_GET['idcentro'];
                                $sql1 = "select idCentros, nome from centros where gerente = $idC and idCentros!= $idcentros";
                                $result2 = mysqli_query($conn, $sql1);
                                $row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
                                
                                $sql4 = "select idCentros, nome from centros where idCentros = $idcentros";
                                $result4 = mysqli_query($conn, $sql4);
                                $row4 = mysqli_fetch_array($result4, MYSQLI_NUM);
                                
                                
                                ?>
                                <option selected value="<?php echo $row4[0]?>"><?php echo $row4[1]?><i class="uil uil-sort"></i></option>
                                <?php while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)){
                            ?>
                            <option value='<?php echo "$row2[0]";?>'><?php echo "$row2[1]";?></option>
                            <?php  
                            }
                            ?>
                    </select>
                    <label class="form-label">Centro</label>
                </div>
                    <div class="form-div">
                        <input type="text" class="input-field" name="setor" placeholder=" " value="<?php echo $row[10]?>"required>
                        <label class="form-label">Setor/Caixa</label>
                    </div>
                    <div class="form-div">
                        <input type="number" class="input-field" name="quant" placeholder=" " value="<?php echo $row[2]?>" required>
                        <label class="form-label">Quantidade</label>
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field" name="tam" placeholder=" " value="<?php echo $row[3]?>"required>
                        <label class="form-label">Tamanho</label>
                    </div>
                    <div class="checkbox">
                        <div class="input-field">
                            <legend>Categoria</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" <?=($row[6]=='S'?'checked':'')?> id="categoria1" class="roupa" value="roupas" onClick="SexoChange(this)">
                                    <label>Roupa 👚</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" <?=($row[7]=='S'?'checked':'')?> id="categoria2" value="comidas" onClick="SexoChange(this)">
                                    <label>Comida 🍕</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" <?=($row[8]=='S'?'checked':'')?> id="categoria3" value="remedios" onClick="SexoChange(this)">
                                    <label>Remédio 💊</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <div class="input-field">
                            <legend>Sexo</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="radio" name="sexo" <?=($row[4]=='Masculino'?'checked':'')?> class="sexo" value="Masculino" onClick="SexoChange(this)">
                                    <label class="label">Masculino</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="sexo" <?=($row[4]=='Feminino'?'checked':'')?>  class="sexo" value="Feminino" onClick="SexoChange(this)">
                                    <label class="label">Feminino</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="sexo" <?=($row[4]=='Unisex'?'checked':'')?>   class="sexo" value="Unisex"onClick="SexoChange(this)">
                                    <label class="label">Unisex</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-div desc">
                        <textarea name="descricao" class="input-field" placeholder=" "><?php echo $row[5]?></textarea>
                        <label class="form-label">Descrição</label>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="id_item" value="<?php echo $row[0];?>">
                </div>
                <div class="buttons">
                    <input type="submit" class="button button2" value="Salvar" required>
                    <input type="button" class="button button-alt" value="Cancelar" onClick="Nova()">
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</body>
</html>