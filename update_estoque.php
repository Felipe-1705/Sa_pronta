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

    $id_prod = $_POST['id_prod'];
    $desc_prod = $_POST['desc_prod'];
    $qntd_prod = $_POST['qntd_prod'];
    $prec_prod = $_POST['prec_prod'];
    $categoria = $_POST['categoria'];




    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    $sql = "UPDATE produtos SET desc_prod = '$desc_prod', qntd_prod ='$qntd_prod', prec_prod='$prec_prod', categoria='$categoria' WHERE id_prod='$id_prod'";
    $stmt = $conexao->prepare($sql);
    if ($stmt->execute()) {
        echo "<center>";
        echo "<form class='form' action='estoque.php'>";
        echo "<div class='container'>";
        echo "<form class='form'>";
        echo "<h3>Produto atualizado com sucesso</h3>";
        echo "<a href='estoque.php'><div class='login-button'>Voltar</div></a>";
        echo "</form>";
        echo "</div>";
        echo "</form>";
        echo "</center> ";
    } else {
        echo $stmt->error;
    }


?>