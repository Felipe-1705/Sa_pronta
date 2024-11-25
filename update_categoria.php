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
if (empty($_POST['desc_categ'])) {
    echo "Favor preencher todos os campos";
} else {
    $id_categ = $_POST['id_categ'];
    $desc_categ = $_POST['desc_categ'];

    

    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    $sql = "UPDATE categoria SET desc_categ = '$desc_categ' WHERE id_categ='$id_categ'";
    $stmt = $conexao->prepare($sql);
    if ($stmt->execute()) {
        echo "<center>";
        echo "<form class='form' action='cadastro_login.html'>";
        echo "<div class='container'>";
        echo "<form class='form'>";
        echo "<h3>Categoria atualizada com sucesso</h3>";
        echo "<a href='categoria.php'><div class='login-button'>Voltar</div></a>";
        echo "</form>";
        echo "</div>";
        echo "</form>";
        echo "</center> ";
    } else {
        echo $stmt->error;
    }

}
?>