<?php
if (isset($_POST['nivel'])) {
    $nivel = $_POST['nivel'];}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="menu.css">
    <script>
        // Passa o valor de $nivel do PHP para o JavaScript
        var nivel = "<?php echo $nivel; ?>";
        
        async function checkNivel() {
            // Verifica o valor da variável nivel passada do PHP
            if (nivel === 'Funcionário') {
                document.getElementById('minhaDiv').style.display = 'none';
            } else if (nivel === 'Administrador') {
                document.getElementById('minhaDiv').style.display = 'flex';
            }
        }

        // Chama a função após o carregamento da página
        window.onload = checkNivel;
    </script>
</head>

<body>
    <header>
        <div class="div">
            <div class="logo">logo</div>
            <nav>
                <ul>
                    <li><a class="NavItem underline" href="menuadm.php">Início</a></li> 
                    <li><a class="NavItem" href="serviço.php">Serviços</a></li>
                    <li><a class="NavItem" href="estoque.php">Estoque</a></li>
                    <li><a class="NavItem" href="usuario.php">Usuários</a></li>
                    <li><a class="NavItem" href="cliente.php">Cliente</a></li>
                </ul>
            </nav>
        </div>
        <div class="user-profile">
            <div class="logout"><a href="index.html"><img src="images/logout.png" title="Logout" alt="Logout"></a></div>
            <div class="user-icon"><img src="images/user.png" alt=""></div> 
        </div>
    </header>
    
    <main>
        <div class="menu-container">
            <a href="serviço.php"> 
                <div class="menu-item">
                    <img src="images/settings.png" alt="Serviços">
                    <div class="icon-placeholder"><p>Serviços</p></div>
                </div>
            </a>

            <a href="estoque.php">
                <div class="menu-item">
                    <img src="images/boxes.png" alt="Serviços">
                    <div class="icon-placeholder"><p>Estoque</p></div>
                </div>
            </a>

            <a href="usuario.php">
                <div id="minhaDiv" class="menu-item">
                    <img src="images/add-contact.png" alt="Novo Perfil">
                    <div class="icon-placeholder"><p>Usuários</p></div>
                </div>
            </a>
            <a href="cliente.php">
                <div id="minhaDiv" class="menu-item">
                    <img src="images/add-contact.png" alt="Novo Perfil">
                    <div class="icon-placeholder"><p>Clientes</p></div>
                </div>
            </a>


        </div>
    </main>
</body>
</html>