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
                    <li><a class="NavItem underline" href="estoque.php">Estoque</a></li>
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
                <input type="text" name="pesquisa" placeholder="Busque pela descrição" class="search-input">
                <button class="search-button">🔍︎</button>
            </form> 
        <div class="botoes">
            <form action="categoria.php" method="POST" class="form">
                <input class="login-button" type="submit" value="       Categorias        ">
            </form>
        
            <form action="cadastro_estoque.php" method="POST" class="form">
                <input class="login-button" type="submit" value="        Novo Produto        ">
            </form>
        </div>
    </section>
    <main>

        <br>
        <table class="tabela" align="center" border="1">
            <tr>
                <th>id</th>
                <th>Descrição</th>
                <th>Preço Unit.</th>
                <th>Quantidade Estoque</th>
                <th>Categoria</th>
                <th colspan="2">Ações</th>

                <?php

                    require_once("conexao.php");
                    $conexao = conectadb();
                    $conexao->set_charset("utf8");

                    if (isset($_POST['pesquisa'])) {
                        $pesquisa = $_POST['pesquisa'];
                        $sql = "SELECT * FROM produtos WHERE desc_prod LIKE '%$pesquisa%'";
                    } else {
                        $sql = "SELECT * FROM produtos ORDER BY desc_prod ASC";
                    }
                    $result = $conexao->query($sql);
                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $linha["id_prod"] . "</td>";
                            echo "<td>" . $linha["desc_prod"] . "</td>";
                            //echo "<td><span>" . str_repeat("•", strlen($linha["senha"])) . "</span></td>";
                            //echo "<td><input type='password' value='" . htmlspecialchars($linha["senha"]) . "' readonly></td>";
                            $precoFormatado = "R$ " . number_format($linha["prec_prod"], 2, ',', '.'); // R$ 29,99
                            echo "<td>" . $precoFormatado . "</td>";
                            echo "<td>" . $linha["qntd_prod"] . "</td>";
                            echo "<td>" . $linha["categoria"] . "</td>";
                           // echo "<td><a href='delete_login.php?id_login=" . $linha["id_prod"] . "'onclick='return confirm(" . '"Tem certeza que quer deletar o usuario?"' . ")'>Deletar</a></td>";
                            echo "<td><a href='form_update_estoque.php?id_prod=" . $linha["id_prod"] . "'onclick='return confirm'>atualizar</a></td>";
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