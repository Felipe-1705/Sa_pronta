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
    <div class="logo"><a href="estoque.php"><img src="images/desfazer.png" alt=""></a></div>
        <div class="heading">Cadastrar Item</div>
            <form action="cadastra_estoque.php" method="POST" class="form">
                <input required="" class="input" type="text" name="desc_prod" id="desc_prod" placeholder="Descrição Produto">
                <input required="" class="input" type="number" name="qntd_prod" id="qntd_prod" placeholder="Quantidade em estoque">
                <input required="" class="input" type="number" name="prec_prod" id="prec_prod" placeholder="Valor Unitário">
                <select class="input" id="categoria" name="categoria" required>
                <option value="" selected disabled>Escolha uma categoria de produto</option>
                <?php
                    
                    require_once("conexao.php");
                    $conexao = conectadb();
                    $conexao->set_charset("utf8");
        
                    $sql = "SELECT desc_categ FROM categoria";
                    $result = $conexao->query($sql);
         
                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) { 
                            $categ = $linha["desc_categ"];
                            echo "<option value='$categ'>" . $categ . "</option>";

                        }

                    } else {
                        echo "<tr><td colspan='5'>Sem Resultado</td></tr>";
                    }
                    $conexao->close();
                ?>

                </select>
                <td></td>
                <input class="login-button" type="submit" value="CADASTRAR">
            </form>
  </div>

</body>
</html>