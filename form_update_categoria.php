<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de estoque</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>


    <?php

    if (isset($_GET["id_categ"])) {
        $id_categ = $_GET["id_categ"];
        require_once("conexao.php");
        $conexao = conectadb();
        $conexao->set_charset("utf8");
        $sql = "SELECT * FROM categoria WHERE id_categ=$id_categ";
        $result = $conexao->query($sql);
        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                $desc_categ = $linha["desc_categ"];
            }
            ?>
            <div class="container">
            <div class="logo"><a href="categoria.php"><img src="images/desfazer.png" alt=""></a></div>
                <div class="heading">Atualizar Categoria</div>
                    <form action="update_categoria.php" method="POST" class="form">
                    <input type="hidden" name="id_categ" value="<?= $id_categ ?>">
                        <input required="" class="input" type="text" name="desc_categ" id="desc_categ" value="<?= $desc_categ ?>"                   placeholder="Usuário">

                        <input class="login-button" type="submit" value="ATUALIZAR">
                       
                    </form>
                </div>
            </div>
                <?php
        } else {
            echo "<tr> Sem Resultados</tr>";
        }
        $conexao->close();
    } else {
        echo "ID não localizado.";
    }
    ?>

</body>

</html>