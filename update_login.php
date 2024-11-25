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
if (empty($_POST['usuario_login']) || empty($_POST['senha_login']) || empty($_POST['nivel_login'])) {
    echo "Favor preencher todos os campos";
} else {
    $id_login = $_POST['id_login'];
    $usuario_login = $_POST['usuario_login'];
    $senha_login = $_POST['senha_login'];
    $nivel_login = $_POST['nivel_login'];
    $funcionario = $_POST['funcionario'];


    }

    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    $sql = "UPDATE login_usuarios SET usuario = '$usuario_login', senha ='$senha_login', nivel='$nivel_login', funcionario='$funcionario' WHERE id_login='$id_login'";
    $stmt = $conexao->prepare($sql);
    if ($stmt->execute()) {
        echo "<center>";
        echo "<form class='form' action='cadastro_login.html'>";
        echo "<div class='container'>";
        echo "<form class='form'>";
        echo "<h3>Usuário atualizado com sucesso</h3>";
        echo "<a href='usuario.php'><div class='login-button'>Voltar</div></a>";
        echo "</form>";
        echo "</div>";
        echo "</form>";
        echo "</center> ";
    } else {
        echo $stmt->error;
    }


?>