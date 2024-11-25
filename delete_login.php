<?php
    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    if (isset($_GET['id_login'])) {
        $id_login = $_GET['id_login'];
        $sql = "DELETE FROM login_usuarios WHERE id_login ='$id_login'";
        $stmt = $conexao->prepare($sql);
        if ($stmt->execute()) {
            header("Location: usuario.php");
        } else {
            echo $stmt->error;
        }
    }
    $conexao->close()
?>
   