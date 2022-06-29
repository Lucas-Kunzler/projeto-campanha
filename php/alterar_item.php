<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/incluir_item.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body onload="SexoChange()">
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
    <?php
    include_once "conexao.php";
    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM centros where idCentros = $codigo";
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
            <form action="inserir_item.php" method="post" enctype="multipart/form-data">
                <h1>Adicionar Item</h1>
                <hr>
                <div class="form-divs">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="item" placeholder=" " value="<?php echo $row[0]?>"required>
                        <label class="form-label">Item</label>
                    </div>
                    <div class="form-div">
                        <select name="centro" id="centro" class="select input-field">
                    <?php
                    include_once "conexao.php";
                    session_start();
                                $codigo = $_SESSION['idC'];
                                $sql1 = "select idCentros, nome from centros where gerente = $codigo";
                                $result2 = mysqli_query($conn, $sql1);

                                echo "<option disabled selected> Selecione o Centro <i class='uil uil-sort'></i></option>";
                                while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)){
                            ?>
                            <option value="<?php echo "$row2[0]";?>"><?php echo "$row2[1]";?></option>
                            <?php  
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
                                    <input type="radio" name="categoria" id="categoria1" class="roupa" value="roupa" onClick="SexoChange(this)">
                                    <label>Roupa 👚</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" id="categoria2" value="comida" onClick="SexoChange(this)">
                                    <label>Comida 🍕</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="radio" name="categoria" id="categoria3" value="remedio" onClick="SexoChange(this)">
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
                    </div>
                        <div class="buttons">
                            <input type="submit" class="button button2" value="Salvar" required>
                            <input type="reset" class="button button-alt" value="Cancelar" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>