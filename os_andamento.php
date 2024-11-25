<?php
// Verifica se o parâmetro id_os foi passado via GET
if (isset($_GET['id_os'])) {
    // Conecta ao banco de dados
    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");

    // Recupera o valor de id_os passado por GET
    $id_os = $_GET['id_os'];

    // Atualiza o campo os_sit da tabela os para 'Em Andamento'
    $sql = "UPDATE os SET os_sit = 'Em Andamento' WHERE id_os = ?";
    
    // Prepara e executa a consulta
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("i", $id_os); // 'i' significa que id_os é um inteiro
        $stmt->execute();

        // Verifica se a atualização foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // Redireciona para os.php com o parâmetro id_os
            header("Location: os.php?id_os=$id_os");
        } else {
            // Caso não tenha sido alterado nada, redireciona sem mensagem
            header("Location: os.php?id_os=$id_os");
        }

        $stmt->close();
    } else {
        // Em caso de erro na execução da consulta, redireciona sem mensagem
        header("Location: os.php?id_os=$id_os");
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Caso o parâmetro id_os não tenha sido passado
    header("Location: os.php");
}
?>
