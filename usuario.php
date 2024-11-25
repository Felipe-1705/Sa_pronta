<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerenciamento estoque</title>
    <link rel="stylesheet" href="tabela.css">
</head>

<body>

    <header>
        <div class="div">
            <div class="logo"><a href="menuAdm.php"><img src="images/desfazer.png" alt=""></a></div>
            <nav>
                <ul>
                    <li><a class="NavItem" href="menuadm.php">Início</a></li> 
                    <li><a class="NavItem" href="serviço.php">Serviços</a></li>
                    <li><a class="NavItem" href="estoque.php">Estoque</a></li>
                    <li><a class="NavItem underline " href="usuario.php">Usuarios</a></li>
                </ul>
            </nav>
        </div>
        <div class="user-profile">
            <div class="logout"><a href="index.html"><img src="images/logout.png" title="Logout" alt="Logout"></a></div>
            <div class="user-icon"><img src="images/user.png" alt=""></div> 
        </div>
    </header>
    <section>
            <form  method="POST"> 
                <label>Pesquisar</label>
                <input type="text" placeholder="Busque pelo nome" class="search-input">
                <button class="search-button">🔍︎</button>
            </form> 


        <form action="cadastro_login.html" method="POST" class="form">
            <input class="login-button" type="submit" value="        Novo Login        ">
        </form>
    </section>
    <main>

        <br>
        <table class="tabela" align="center" border="1">
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>usuario</th>
                <th>senha</th>
                <th>nivel</th>
                <th colspan="2">Ações</th>

                <?php

                    require_once("conexao.php");
                    $conexao = conectadb();
                    $conexao->set_charset("utf8");

                    if (isset($_POST['pesquisa'])) {
                        $nome = $_POST['pesquisa'];
                        $sql = "SELECT * FROM login_usuarios WHERE usuario LIKE '%$nome%'";
                    } else {
                        $sql = "SELECT * FROM login_usuarios ORDER BY usuario ASC";
                    }
                    $result = $conexao->query($sql);
                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $linha["id_login"] . "</td>";
                            echo "<td>" . $linha["funcionario"] . "</td>";
                            echo "<td>" . $linha["usuario"] . "</td>";
                            echo "<td><span>" . str_repeat("•", strlen($linha["senha"])) . "</span></td>";
                            //echo "<td><input type='password' value='" . htmlspecialchars($linha["senha"]) . "' readonly></td>";
                            //echo "<td><input type='password' value=' .$linha["senha"].' readonly></td>";
                            echo "<td>" . $linha["nivel"] . "</td>";
                            echo "<td><a href='delete_login.php?id_login=" . $linha["id_login"] . "'onclick='return confirm(" . '"Tem certeza que quer deletar o usuario?"' . ")'>Deletar</a></td>";
                            echo "<td><a href='form_update_login.php?id_login=" . $linha["id_login"] . "'onclick='return confirm'>atualizar</a></td>";
                            echo "</tr>";
                            
                        }

                    } else {
                        echo "<tr><td colspan='5'>Sem Resultado</td></tr>";
                    }
                    $conexao->close();
                ?>
            </tr>
        </table>
        
    </main>

        
    
</body>
</html>