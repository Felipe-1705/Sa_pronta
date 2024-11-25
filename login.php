<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
// Conectar ao banco de dados
$servername = "127.0.0.1"; // ou o endereço do seu servidor de banco de dados
$username = "root"; // seu usuário do banco de dados
$password = ""; // sua senha do banco de dados
$dbname = "sa_felipe";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber os dados de usuário e senha via POST
$usuario_login = $_POST['usuario'];
$senha_login = $_POST['senha'];

// Verificar se o login existe e pegar o nível
$sql = "SELECT * FROM login_usuarios WHERE usuario = '$usuario_login' AND senha = '$senha_login'";
$result = $conn->query($sql); 



if ($result->num_rows > 0) {
    // Se o login existir, verificar o nível
    $row = $result->fetch_assoc();
    $nivel = $row['nivel'];

    // Verificar o nível e redirecionar para o arquivo apropriado
    if ($nivel == 'Funcionário') {
        $nivel = 'Funcionário'; // ou 'admin', 'gerente', etc.


    } elseif ($nivel == 'Administrador') {
        $nivel = 'Administrador'; // ou 'admin', 'gerente', etc.

    } else {
        echo "Nível de acesso desconhecido.";
    }

} else {
    header("Location: erroLogin.html");

}
// Fechar a conexão

$conn->close();
?>
    <form id="formNivel" action="menuAdm.php" method="POST" style="display: none;">
        <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">
        <button type="submit">Enviar</button>
    </form>

    <script>
        // Checa o valor de "nivel" e submete o formulário automaticamente
        var nivel = "<?php echo $nivel; ?>";
        
        if (nivel === 'Funcionário' || nivel === 'Administrador') {
            document.getElementById('formNivel').submit();
        }
    </script>
</body>
</html>
