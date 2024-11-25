<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
    <div class="logo"><a href="serviço.php"><img src="images/desfazer.png" alt=""></a></div>
        <div class="heading">Abrir Ordem de Serviço</div>
            <form action="cadastra_os.php" method="POST" class="form">
        
                <input style="display: none;" required="" class="input" type="date"  name="os_data_inicio" id="os_data_inicio" placeholder="Data de abertura">
            
                <label for="os_previsto">Previsão de Conclusão</label>
                <input required="" class="input" type="date"  name="os_previsto" id="os_previsto" placeholder="Data de abertura">
                <input required="" class="input" type="number"  name="os_preco" id="os_preco" placeholder="Valor do serviço">

                <select class="input" id="os_atribuido" name="os_atribuido" placeholder="Funcionário Atribuído" required>
                    <option value="" selected disabled>Atribua um funcionário a essa OS</option>
                    <?php
                        require_once("conexao.php");
                        $conexao = conectadb();
                        $conexao->set_charset("utf8");
            
                        $sql = "SELECT funcionario FROM login_usuarios";
                        $result = $conexao->query($sql);
            
                        if ($result->num_rows > 0) {
                            while ($linha = $result->fetch_assoc()) { 
                                $funcionario = $linha["funcionario"];
                                echo "<option value='$funcionario'>" . $funcionario . "</option>";

                            }

                        } else {
                            echo "<tr><td colspan='5'>Sem Resultado</td></tr>";
                        }
                        $conexao->close();
                    ?>

                </select>
                <select class="input" id="cliente" name="cliente" placeholder="Cliente" required>
                    <option value="" selected disabled>Atribua um cliente a essa OS</option>
                    <?php
                        require_once("conexao.php");
                        $conexao = conectadb();
                        $conexao->set_charset("utf8");
            
                        $sql = "SELECT nome_cliente FROM cliente";
                        $result = $conexao->query($sql);
            
                        if ($result->num_rows > 0) {
                            while ($linha = $result->fetch_assoc()) { 
                                $cliente = $linha["nome_cliente"];
                                echo "<option value='$cliente'>" . $cliente . "</option>";

                            }

                        } else {
                            echo "<tr><td colspan='5'>Sem Resultado</td></tr>";
                        }
                        $conexao->close();
                    ?>

                </select>
                <input style="display: none;" required="" class="input" type="text"  name="os_sit" id="os_sit" placeholder="Data de abertura">
                <textarea  style="resize: none;" required="" class="input" name="os_descriçao" cols="50" row="6" placeholder="Descriçao do Serviço"></textarea>
                <p>Produtos a serem Usados</p>
                <select class="input" name="os_prod_1" placeholder="" required>
                    <option value="" selected disabled>Escolha os Produtos</option>

                    <?php
                        require_once("conexao.php");
                        $conexao = conectadb();
                        $conexao->set_charset("utf8");
            
                        $sql = "SELECT * FROM produtos";
                        $result = $conexao->query($sql);
            
                        if ($result->num_rows > 0) {
                            while ($linha = $result->fetch_assoc()) { 
                                $id_prod = $linha["id_prod"];
                                $desc_prod = $linha["desc_prod"];
                                echo "<option value='$desc_prod'>" . $desc_prod . "</option>";

                            }

                        } else {
                            echo "<tr><td colspan='5'>Sem produtos no estoque</td></tr>";
                        }
                        $conexao->close();
                    ?>
                </select>
                
                <select class="input" id="prod2" name="os_prod_2">
                    <option value="" selected ></option>
                    <?php
                        require_once("conexao.php");
                        $conexao = conectadb();
                        $conexao->set_charset("utf8");
            
                        $sql = "SELECT * FROM produtos";
                        $result = $conexao->query($sql);
            
                        if ($result->num_rows > 0) {
                            while ($linha = $result->fetch_assoc()) { 
                                $id_prod = $linha["id_prod"];
                                $desc_prod = $linha["desc_prod"];
                                echo "<option value='$desc_prod'>" . $desc_prod . "</option>";

                            }

                        } else {
                            echo "<tr><td colspan='5'>Sem produtos no estoque</td></tr>";
                        }
                        $conexao->close();
                    ?>
                </select>

                <select class="input" id="prod3" name="os_prod_3" placeholder="Funcionário Atribuído">
                    <option value="" selected ></option>
                    <?php
                        require_once("conexao.php");
                        $conexao = conectadb();
                        $conexao->set_charset("utf8");
            
                        $sql = "SELECT * FROM produtos";
                        $result = $conexao->query($sql);
            
                        if ($result->num_rows > 0) {
                            while ($linha = $result->fetch_assoc()) { 
                                $id_prod = $linha["id_prod"];
                                $desc_prod = $linha["desc_prod"];
                                echo "<option value='$desc_prod'>" . $desc_prod . "</option>";

                            }

                        } else {
                            echo "<tr><td colspan='5'>Sem produtos no estoque</td></tr>";
                        }
                        $conexao->close();
                    ?>
                </select>

                <td></td>
                <input class="login-button" type="submit" value="CADASTRAR">

            </form>
    </div>

    <script>
        // Obter a data de hoje no formato YYYY-MM-DD
        const hoje = new Date().toISOString().split("T")[0];
        // Definir o valor padrão do campo de data de abertura para a data de hoje
        document.getElementById("os_data_inicio").value = hoje;
        
        // Definir o valor padrão do campo os_sit para "Em andamento"
        document.getElementById("os_sit").value = "Pendente";
    </script>
  
  

</body>
</html>
