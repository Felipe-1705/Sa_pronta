<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    <link rel="stylesheet" href="tabela.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .form2{
            display: inline;
            width: 40%;
        }

        .form2 .login-button2 {
            display: flex;
            width: 70%;
            font-weight: bold;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }
        .container {
            max-width: 600px;
            margin: 30px auto 0px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container2{
            max-width: 600px;
            margin: 0px auto;
            padding: 20px;
        }


        .section-title {
            color: rgb(16, 137, 211);
            font-size: 18px;
            margin-bottom: 10px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;

            font-size: 16px;
        }



        .info-label {
            font-weight: bold;
            color: rgb(16, 137, 211);
        }
        .details-field {
            width: 100%;
            min-height: 80px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e3f8fc;
        }
        .products {
            margin-top: 20px;
        }
        .product-item {
            margin-bottom: 8px;
            padding: 8px;
            background-color: #e3f8fc;
            border-radius: 4px;
        }
        
        .buttons-container {
            display: flex;
            justify-content: center; /* Centraliza os botões horizontalmente */
            margin-top: 20px; /* Espaço entre o container e os botões */
            margin-bottom: 20px; /* Espaço adicional na parte inferior */
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #10a9d1;
            color: white;
            border: none;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 10px; /* Espaço entre os botões */
        }

        .button:hover {
            background-color: #1299d1;
        }
    </style>
</head>
<body>
    <header>
        <div class="div">
        <div class="logo"><a href="serviço.php"><img src="images/desfazer.png" alt=""></a></div>
            <nav>
                <ul>
                    <li><a class="NavItem" href="menuadm.php">Início</a></li> 
                    <li><a class="NavItem underline" href="serviço.php">Serviços</a></li>
                    <li><a class="NavItem" href="estoque.php">Estoque</a></li>
                    <li><a class="NavItem " href="usuario.php">Usuarios</a></li>
                </ul>
            </nav>
        </div>
        <div class="user-profile">
            <div class="user-icon"><img src="images/user.png" alt=""></div> 
        </div>
    </header>

    <?php
        if (isset($_GET["id_os"])) {
            $id_os = $_GET["id_os"];
            require_once("conexao.php");
            $conexao = conectadb();
            $conexao->set_charset("utf8");
            $sql = "SELECT * FROM os WHERE id_os=$id_os";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                while ($linha = $result->fetch_assoc()) {
                    $os_data_inicio = $linha["os_data_inicio"];
                    $os_previsto = $linha["os_previsto"];
                    $os_atribuido = $linha["os_atribuido"];
                    $os_sit = $linha["os_sit"];
                    $os_preco = $linha["os_preco"];
                    $os_descriçao = $linha["os_descriçao"];
                    $os_prod_1 = $linha["os_prod_1"];
                    $os_prod_2 = $linha["os_prod_2"];
                    $os_prod_3 = $linha["os_prod_3"];
                    
        ?>
                    <div class="container">
                        <div class="info-row">
                            <div class="info-label">Data de Abertura:</div>
                            <div class="info-value"><?= $os_data_inicio ?></div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Data Prevista:</div>
                            <div class="info-value"><?= $os_previsto ?></div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Funcionário Atribuído:</div>
                            <div class="info-value"><?= $os_atribuido ?></div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Situação:</div>
                            <div class="info-value"><?= $os_sit ?></div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Preço do Serviço:</div>
                            <div class="info-value"><?= $os_preco ?></div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Descrição do Serviço:</div>
                            <div class="details-field"><?= $os_descriçao ?></div>
                        </div>

                        <div class="products">
                            <h3 class="section-title">Produtos Utilizados</h3>
                            <div class="product-item"><?= $os_prod_1 ?></div>
                            <div class="product-item"><?= $os_prod_2 ?></div>
                            <div class="product-item"><?= $os_prod_3 ?></div>
                        </div>
                    </div>

                    <div class="buttons-container">
                        <form action="os_andamento.php" method="GET">
                            <input type="hidden" name="id_os" value="<?= $id_os ?>">
                            <button class="button" type="submit">Definir como <strong>Em Andamento</strong></button>
                        </form>
                        <form action="os_finalizada.php" method="GET">
                            <input type="hidden" name="id_os" value="<?= $id_os ?>">
                            <button class="button" type="submit">Definir como <strong>Finalizada</strong></button>
                        </form>
                    </div>
                    
        <?php
                }
            }
            $conexao->close();
        }
    ?>
</body>
</html>
