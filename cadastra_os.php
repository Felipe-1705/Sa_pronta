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

    $os_data_inicio = $_POST['os_data_inicio'];
    $os_previsto = $_POST['os_previsto'];
    $os_preco = $_POST['os_preco'];
    $os_atribuido = $_POST['os_atribuido'];
    $os_sit = $_POST['os_sit'];
    $os_descriçao = $_POST['os_descriçao'];
    $os_prod_1 = $_POST['os_prod_1'];
    $os_prod_2 = $_POST['os_prod_2'];
    $os_prod_3 = $_POST['os_prod_3'];
    $cliente = $_POST['cliente'];
    
    $case = 0;

    if (empty($os_prod_3) && ($os_prod_2 !=="")) {
        $case = 1;
    } elseif (empty($os_prod_2) && empty($os_prod_3)) {
        $case = 2;
    } else{
        $case = 3;
    }

    switch ($case) {
        case 1:
            $sql = "INSERT INTO os (os_data_inicio, os_previsto, os_preco, os_atribuido, os_sit, os_descriçao, os_prod_1, os_prod_2, cliente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $os_data_inicio, $os_previsto, $os_preco, $os_atribuido, $os_sit, $os_descriçao, $os_prod_1, $os_prod_2, $cliente);
            break;

        case 2:
            $sql = "INSERT INTO os (os_data_inicio, os_previsto, os_preco, os_atribuido, os_sit, os_descriçao, os_prod_1, cliente) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $os_data_inicio, $os_previsto, $os_preco, $os_atribuido, $os_sit, $os_descriçao, $os_prod_1, $cliente);
            break;
    
        case 3:
            $sql = "INSERT INTO os (os_data_inicio, os_previsto, os_preco, os_atribuido, os_sit, os_descriçao, os_prod_1, os_prod_2, os_prod_3, cliente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssss", $os_data_inicio, $os_previsto, $os_preco, $os_atribuido, $os_sit, $os_descriçao, $os_prod_1, $os_prod_2, $os_prod_3, $cliente);
            break;
        default:
            // Tratamento para casos que não atendem a nenhuma condição
            echo "Erro: Nenhuma condição correspondente foi atendida.";
            break;
    }

    // Prepara o comando SQL para inserir os dados
    // $sql = "INSERT INTO os (os_data_inicio, os_previsto, os_preco, os_atribuido, os_descriçao, os_prod_1, os_prod_2, os_prod_3 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepara a consulta para evitar SQL Injection
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("ssssssss", $os_data_inicio, $os_previsto, $os_preco, $os_atribuido, $os_descriçao, $os_prod_1, $os_prod_2, $os_prod_3);

    // Executa a consulta
    if ($stmt->execute()) {
        $sql_update_func = "UPDATE login_usuarios SET qntd_os = qntd_os + 1 WHERE funcionario = '$os_atribuido'";
        $conn->query($sql_update_func);

        // Decrementa 1 da quantidade de produto para cada $os_prod que não estiver vazio
        if (!empty($os_prod_1)) {
            $sql_update_1 = "UPDATE produtos SET qntd_prod = qntd_prod - 1 WHERE desc_prod = ?";
            $stmt_update_1 = $conn->prepare($sql_update_1);
            $stmt_update_1->bind_param("s", $os_prod_1);
            $stmt_update_1->execute();
            $stmt_update_1->close();
        }

        if (!empty($os_prod_2)) {
            $sql_update_2 = "UPDATE produtos SET qntd_prod = qntd_prod - 1 WHERE desc_prod = ?";
            $stmt_update_2 = $conn->prepare($sql_update_2);
            $stmt_update_2->bind_param("s", $os_prod_2);
            $stmt_update_2->execute();
            $stmt_update_2->close();
        }

        if (!empty($os_prod_3)) {
            $sql_update_3 = "UPDATE produtos SET qntd_prod = qntd_prod - 1 WHERE desc_prod = ?";
            $stmt_update_3 = $conn->prepare($sql_update_3);
            $stmt_update_3->bind_param("s", $os_prod_3);
            $stmt_update_3->execute();
            $stmt_update_3->close();
        }
        echo "<center>";
        echo "<form class='form' action='cadastro_os.php'>";
        echo "<div class='container'>";
        echo "<form class='form'>";
        echo "<h3>Cadastrado com sucesso</h3>";
        echo "<a href='cadastro_os.php'><div class='login-button'>Cadastrar Outro</div></a>";
        echo "<a href='serviço.php'><div class='login-button'>Voltar</div></a>";
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
