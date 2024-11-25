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
        <div class="logo"><a href="cliente.php"><img src="images/desfazer.png" alt=""></a></div>
        <div class="heading">Cadastrar Cliente</div>
            <form action="cadastra_cliente.php" method="POST" class="form">
                <input required="" class="input" type="text" name="nome_cliente" id="nome_cliente" placeholder="Nome do Cliente">
                <input required="" class="input" type="email" name="email_cliente" id="email_cliente" placeholder="E-mail do Cliente">
                <td></td>
                <input class="login-button" type="submit" value="CADASTRAR">
            </form>
  </div>

</body>
</html>
