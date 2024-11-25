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
    if (isset($_GET["id_cliente"])) {
        $id_cliente = $_GET["id_cliente"];
        require_once("conexao.php");
        $conexao = conectadb();
        $conexao->set_charset("utf8");
        $sql = "SELECT * FROM cliente WHERE id_cliente=$id_cliente";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                $id_cliente = $linha["id_cliente"];
                $nome_cliente = $linha["nome_cliente"];
                $email_cliente = $linha["email_cliente"];

            }
            ?>

            <div class="container">
            <div class="logo"><a href="cliente.php"><img src="images/desfazer.png" alt=""></a></div>
                <div class="heading">Atualizar Cliente</div>
                <form action="update_cliente.php" method="POST" class="form">
                    <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>">
                    <input required="" class="input" type="text" name="nome_cliente" id="funcionario" value="<?= $nome_cliente ?>" placeholder="Nome Funcionário">
                    <input required="" class="input" type="email" name="email_cliente" id="email_cliente" value="<?= $email_cliente ?>" placeholder="Senha">

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
