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
                    <li><a class="NavItem underline" href="serviço.php">Serviços</a></li>
                    <li><a class="NavItem" href="estoque.php">Estoque</a></li>
                    <li><a class="NavItem" href="usuario.php">Usuarios</a></li>
                    <li><a class="NavItem" href="cliente.php">Cliente</a></li>
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
                <input type="text" placeholder="Busque pela descrição" name="pesquisa"class="search-input">
                <button class="search-button">🔍︎</button>
            </form> 


        <form action="cadastro_os.php" method="POST" class="form">
            <input class="login-button" type="submit" value="   Abrir Ordem de Serviço   ">
        </form>
    </section>
    <main>

        <br>
        <table class="tabela" align="center" border="1">
            <tr>
                <th>ID</th>
                <th>Data de Abertura</th>
                <th>Descrição</th>
                <th>Funcionário Responsável</th>
                <th>Cliente</th>
                <th>Situação</th>
                <th colspan="2">Ações</th>

                <?php

                    require_once("conexao.php");
                    $conexao = conectadb();
                    $conexao->set_charset("utf8");

                    if (isset($_POST['pesquisa'])) {
                        $pesquisa = $_POST['pesquisa'];
                        $sql = "SELECT * FROM os WHERE os_descriçao LIKE '%$pesquisa%'";
                    } else {
                        $sql = "SELECT * FROM os ORDER BY os_data_inicio ASC";
                    }
                    $result = $conexao->query($sql);
                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $linha["id_os"] . "</td>";
                            echo "<td>" . $linha["os_data_inicio"] . "</td>";
                            $descricao = $linha["os_descriçao"];
                            if (strlen($descricao) > 40) {
                                $descricao = substr($descricao, 0, 40) . "..."; // Adiciona '...' se o texto for maior que 40 caracteres
                            }
                            echo "<td>" . $descricao . "</td>";
                            echo "<td>" . $linha["os_atribuido"] . "</td>"; 
                            echo "<td>" . $linha["cliente"] . "</td>"; 
                            echo "<td>" . $linha["os_sit"] . "</td>";
                            echo "<td><a href='os.php?id_os=" . $linha["id_os"] . "'onclick='return confirm'>Ver / Atualizar</a></td>";
                            
                            echo "</tr>";
                            
                        }

                    } else {
                        echo "<tr><td colspan='5'>Sem Ordens de Serviço atualmente</td></tr>";
                    }
                    $conexao->close();
                ?>
            </tr>
        </table>
        
    </main>

        
    
</body>
</html>