<?php
    require_once("conexao.php");
    $conexao = conectadb();
    $conexao->set_charset("utf8");
    if (isset($_GET['id_cliente'])) {
        $id_cliente = $_GET['id_cliente'];
        $sql = "DELETE FROM cliente WHERE id_cliente ='$id_cliente'";
        $stmt = $conexao->prepare($sql);
        if ($stmt->execute()) {
            header("Location: cliente.php");
        } else {
            echo $stmt->error;
        }
    }
    $conexao->close()
?>
   