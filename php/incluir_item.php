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
    ?>
    <div class="centro-popup">
        <div class="popup">
            <form action="inserir_item.php" method="post" enctype="multipart/form-data">
                <h1>Adicionar Item</h1>
                <hr>
                <div class="form-divs">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="item" placeholder=" " required>
                        <label class="form-label">Item</label>
                    </div>
                    <div class="form-div">
                        <select name="centro" value="" id="centro" class="select input-field" required>
                        <option disabled selected> Selecione o Centro <i class='uil uil-sort'></i></option>
                            <?php
                                include_once "conexao.php";
                                session_start();
                                        $codigo = $_SESSION['idC'];
                                        $sql1 = "select idCentros, nome from centros where gerente = $codigo";
                                        $result2 = mysqli_query($conn, $sql1);

                                        
                                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)){
                                    ?>
                                    <option value="<?php echo "$row2[0]";?>"><?php echo "$row2[1]";?></option>
                                    <?php  
                                    $centrosss= $row2[0];
                                    }
                            ?>
                        </select>
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field" name="setor" placeholder=" " required>
                        <label class="form-label">Setor/Caixa</label>
                    </div>
                    <div class="form-div">
                        <input type="number" class="input-field" name="quant" placeholder=" " required>
                        <label class="form-label">Quantidade</label>
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field" name="tam" placeholder=" " required>
                        <label class="form-label">Tamanho</label>
                    </div>
                    <div class="checkbox">
                        <div class="input-field">
                            <legend>Categoria</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" id="categoria1" class="roupa" value="roupas" required onClick="SexoChange(this)">
                                    <label>Roupa 👚</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" id="categoria2" value="comidas" onClick="SexoChange(this)">
                                    <label>Comida 🍕</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" id="categoria3" value="remedios" onClick="SexoChange(this)">
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
                                    <input type="radio" name="sexo" id="sexo1" class="sexo" value="Masculino">
                                    <label class="label">Masculino</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="sexo" id="sexo2" class="sexo" value="Feminino">
                                    <label class="label">Feminino</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="sexo" id="sexo3" class="sexo" value="Unisex">
                                    <label class="label">Unisex</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-div desc">
                        <textarea name="descricao" class="input-field" placeholder=" "></textarea>
                        <label class="form-label">Descrição</label>
                    </div>
                    <input type="hidden" name="centro1"  value="<?php $centrosss?>">
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