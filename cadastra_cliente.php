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
// Configurações do banco de dados
$servername = "127.0.0.1";
$username = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "sa_felipe"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados via POST
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];


    // Prepara o comando SQL para inserir os dados
    $sql = "INSERT INTO cliente (nome_cliente, email_cliente) VALUES (?, ?)";

    // Prepara a consulta para evitar SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome_cliente, $email_cliente);

    // Executa a consulta
    if ($stmt->execute()) {
       echo "<center>";
       echo "<form class='form' action='cadastro_login.html'>";
       echo "<div class='container'>";
       echo "<form class='form'>";
       echo "<h3>Cadastrado com sucesso</h3>";
       echo "<a href='cadastro_cliente.php'><div class='login-button'>Cadastrar Outro</div></a>";
       echo "<a href='cliente.php'><div class='login-button'>Voltar</div></a>";
       echo "</form>";
       echo "</div>";
       echo "</form>";
       echo "</center> ";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha o statement e a conexão
    $stmt->close();
}

$conn->close();
?>
