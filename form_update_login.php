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
    if (isset($_GET["id_login"])) {
        $id_login = $_GET["id_login"];
        require_once("conexao.php");
        $conexao = conectadb();
        $conexao->set_charset("utf8");
        $sql = "SELECT * FROM login_usuarios WHERE id_login=$id_login";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                $usuario_login = $linha["usuario"];
                $senha_login = $linha["senha"];
                $nivel_login = $linha["nivel"];
                $funcionario = $linha["funcionario"];
            }
            ?>

            <div class="container">
            <div class="logo"><a href="usuario.php"><img src="images/desfazer.png" alt=""></a></div>
                <div class="heading">Atualizar Usuário</div>
                <form action="update_login.php" method="POST" class="form">
                    <input type="hidden" name="id_login" value="<?= $id_login ?>">
                    <input required="" class="input" type="text" name="funcionario" id="funcionario" value="<?= $funcionario ?>" placeholder="Nome Funcionário">
                    <input required="" class="input" type="text" name="usuario_login" id="usuario_login" value="<?= $usuario_login ?>" placeholder="Usuário">
                    <input required="" class="input" type="password" name="senha_login" id="senha_login" value="<?= $senha_login ?>" placeholder="Senha">

                    <select class="input" id="nivel_login" name="nivel_login" required>
                        <option value="Funcionário" <?php if ($nivel_login == 'Funcionário') echo 'selected'; ?>>Funcionário</option>
                        <option value="Administrador" <?php if ($nivel_login == 'Administrador') echo 'selected'; ?>>Administrador</option>
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
