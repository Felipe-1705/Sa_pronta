<?php
    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    if (isset($_GET['id_categ'])) {
        $id_categ = $_GET['id_categ'];
        $sql = "DELETE FROM categoria WHERE id_categ ='$id_categ'";
        $stmt = $conexao->prepare($sql);
        if ($stmt->execute()) {
            header("Location: categoria.php");
        } else {
            echo $stmt->error;
        }
    }
    $conexao->close()
?>
   