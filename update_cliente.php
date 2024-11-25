<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="index.css">
    <style>
        h3{
            color: rgb(31, 230, 130);
        }
    </style>
</head>
<?php
//empty($_POST['id_login']) ||
if (empty($_POST['nome_cliente']) || empty($_POST['email_cliente'])) {
    echo "Favor preencher todos os campos";
} else {
    $id_cliente = $_POST['id_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    }

    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    $sql = "UPDATE cliente SET nome_cliente = '$nome_cliente', email_cliente ='$email_cliente',  WHERE id_cliente='$id_cliente'";
    $stmt = $conexao->prepare($sql);
    if ($stmt->execute()) {
        echo "<center>";
        echo "<form class='form' action='cadastro_login.html'>";
        echo "<div class='container'>";
        echo "<form class='form'>";
        echo "<h3>Usuário atualizado com sucesso</h3>";
        echo "<a href='cliente.php'><div class='login-button'>Voltar</div></a>";
        echo "</form>";
        echo "</div>";
        echo "</form>";
        echo "</center> ";
    } else {
        echo $stmt->error;
    }


?>