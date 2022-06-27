<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../css/incluir_centro.css">
</head>
<body>
<div class="navbar">
        <div class="logo">
            <a href="../html/index.html"><i class="uil uil-adjust-circle"></i></a>
        </div>
        <div class="links">
            <div class="link">
                <a href="../html/index.html" class="a-link"><span class="text-link">Home</span></a>
            </div>
            <div class="link">
                <a href="about.html" class="a-link"><span class="text-link">Sobre nós</span></a>
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
                <h1>Adicionar centro</h1>
                <hr>
                <div class="form-divs">
                    <div class="form-div nome">
                        <input type="text" class="input-field" name="nome" placeholder=" " required>
                        <label class="form-label">Nome do Centro</label>
                    </div>
                    <div class="form-div">
                        <select name="estado" id="estado" class="select input-field">
                            <option disabled selected>Selecione um Estado<i class="uil uil-sort"></i></option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                        <!-- <input type="text" class="input-field" name="estado" placeholder=" " required>
                        <label class="form-label">Estado</label> -->
                        
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field"name="cidade" placeholder=" " required>
                        <label class="form-label">Cidade</label>
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field"name="bairro" placeholder=" " required>
                        <label class="form-label">Bairro</label>
    
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field"name="rua" placeholder=" " required>
                        <label class="form-label">Rua</label>
    
                    </div>
                    <div class="form-div">
                        <input type="number" class="input-field" name="numero" placeholder=" " required>
                        <label class="form-label">Número</label>
                    </div>
                    <div class="form-div">
                        <input type="text" class="input-field" name="observacao" placeholder=" " required>
                        <label class="form-label">Observação</label>
                    </div>
                    
                    <div class="form-div">
                        <select name="gerente" id="gerente" class="select input-field">
                            <option disabled selected>Selecione um Gerente<i class="uil uil-sort"></i></option>
                            <?php
                            include_once 'conexao.php';
                                $sql = "SELECT idColaboradores,nome FROM campanha_agasalho.colaboradores";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                            ?>
                            <option value="<?php echo "$row[1]";?>"><?php echo "$row[1]";?></option>
                            <?php  }
                                }
                                
                            ?>
                            
                        </select>
                        <!-- <input type="text" class="input-field" name="estado" placeholder=" " required>
                        <label class="form-label">Estado</label> -->
                        
                    </div>
                    <div class="form-div horario">
                        <input type="time" class="input-field" name="hab" placeholder=" " required>
                        <label class="form-label">Horario de Abertura</label>
                    </div>
                    <div class="form-div horario">
                        <input type="time" class="input-field" name="hfe" placeholder=" " required>
                        <label class="form-label">Horario de Fechamento</label>
                    </div>
                    <div class="checkbox">
                        <div class="input-field">
                            <legend>Itens</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="checkbox" value="S" name="roupas">
                                    <label>Roupas</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" value="S" name="comidas">
                                    <label>Comida</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" value="S" name="remedios">
                                    <label>Remédios</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <div class="input-field">
                            <legend>Meios de doação</legend>
                            <div class="fieldset-divs">
                                <div class="fieldset-div">
                                    <input type="checkbox" name="nolocal">
                                    <label>No Local</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" name="agenhorario">
                                    <label>Agendar horário</label>
                                </div>
                                <div class="fieldset-div">
                                    <input type="checkbox" name="buscamosvc">
                                    <label>Buscamos pra você</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="muni-add form-div">
                        <div class="image-add">
                            
                            <label for="imagem">Imagem:</label>
                            <input type="file" name="arquivo">

                        </div>
                        <section class="area-progresso">
                            <div class="row">
                                <div class="content">
                                    <div class="details"></div>
                                    <div class="barra-progresso">
                                        <div class="progresso"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- <div class="content">
                    <div class="info">
                        <div class="info-class info-add">
                            <input type="time" class="input-field"name="hfe" placeholder=" ">
                        </div>
                    </div>
                </div> -->
                    
                    <div class="buttons">
                        <input type="submit" class="button button2" value="Salvar" required>
                        <input type="reset" class="button button-alt" value="Cancelar" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>