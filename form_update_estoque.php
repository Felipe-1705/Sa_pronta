<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <?php
    if (isset($_GET["id_prod"])) {
        $id_prod = $_GET["id_prod"];
        require_once("conexao.php");
        $conexao = conectadb();
        $conexao->set_charset("utf8");
        $sql = "SELECT * FROM produtos WHERE id_prod=$id_prod";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                $desc_prod = $linha["desc_prod"];
                $qntd_prod = $linha["qntd_prod"];
                $prec_prod = $linha["prec_prod"];
                $categoria = $linha["categoria"];
            }
            ?>

            <div class="container">
            <div class="logo"><a href="estoque.php"><img src="images/desfazer.png" alt=""></a></div>
                <div class="heading">Atualizar Produto</div>
                <form action="update_estoque.php" method="POST" class="form">
                    <input type="hidden" name="id_prod" value="<?= $id_prod ?>">
                    <input required="" class="input" type="text" name="desc_prod" id="desc_prod" value="<?= $desc_prod ?>" placeholder="Descriçao">
                    <input required="" class="input" type="number" name="qntd_prod" id="qntd_prod" value="<?= $qntd_prod ?>" placeholder="Quantidade">
                    <input required="" class="input" type="number" name="prec_prod" id="prec_prod" value="<?= $prec_prod ?>" placeholder="Preço">
                    
                    <select class="input" id="categoria" name="categoria" required>
                        <option value="" selected disabled>Escolha uma categoria de produto</option>
                        <?php
                        $sql = "SELECT desc_categ FROM categoria";
                        $result = $conexao->query($sql);

                        if ($result->num_rows > 0) {
                            while ($linha = $result->fetch_assoc()) { 
                                $categ = $linha["desc_categ"];
                                echo "<option value='$categ'>" . $categ . "</option>";
                            }
                        } else {
                            echo "<option disabled>Sem Resultado</option>";
                        }
                        ?>
                    </select>

                    <input class="login-button" type="submit" value="ATUALIZAR">
                </form>
            </div>

            <?php
        } else {
            echo "<p>Sem Resultados</p>";
        }
        $conexao->close();
    } else {
        echo "<p>ID não localizado.</p>";
    }
    ?>

</body>
</html>
