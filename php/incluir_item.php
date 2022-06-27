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

    <div class="centro-popup">
        <div class="popup">
            <form action="inserir.php" method="post" enctype="multipart/form-data">
                <h1>Adicionar Item</h1>
                <hr>
                <div class="form-divs">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="item" placeholder=" " required>
                        <label class="form-label">Item</label>
                    </div>
                    <div class="form-div">
                        <select name="centro" id="centro" class="select input-field">
                    <?php
                    include_once "conexao.php";
                                $codigo=2;
                                $sql1 = "select idCentros, nome from centros where gerente = $codigo";
                                $result2 = mysqli_query($conn, $sql1);
                                
                                echo "<option disabled selected> Selecione o Centro <i class='uil uil-sort'></i></option>";
                                while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)){
                            ?>
                            <option value="<?php echo "$row2[1]";?>"><?php echo "$row2[1]";?></option>
                            <?php  
                            }
                    ?>
                    </select>
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
                                    <input type="checkbox" name="categoria" id="categoria1" class="roupa" value="Roupas" onClick="ckChange(this)">
                                    <label>Roupa 👚</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" name="categoria" id="categoria2" value="Comida" onClick="ckChange(this)">
                                    <label>Comida 🍕</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" name="categoria" id="categoria3" value="Remédios" onClick="ckChange(this)">
                                    <label>Remédio 💊</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox cor">
                        <div class="input-field">
                            <legend>Cor</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Azul</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Amarelo</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Verde</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Roxo</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Laranja</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Vermelho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Marinho</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Bege</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Marrom</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Branco</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Preto</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" class="cores" disabled>
                                    <label class="label">Cinza</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <div class="input-field">
                            <legend>Sexo</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="checkbox" name="sexo" id="sexo1" onClick="ckChange(this)">
                                    <label>Masculino</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" name="sexo" id="sexo2" onClick="ckChange(this)">
                                    <label>Feminino</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" name="sexo" id="sexo3" onClick="ckChange(this)">
                                    <label>Unisex</label>
                                </div>
                            </div>
                        </div>
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
    <script src="../js/incluir_item.js"></script>
</body>
</html>