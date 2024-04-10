<?php
require_once 'C:/xampp/htdocs/grupo2/db/db.php';
require_once 'C:/xampp/htdocs/grupo2/app/Controller/controllerusuarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo usuário
    if (isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_FILES['foto_perfil'])) {
        $foto_perfil = $_FILES['foto_perfil']['name'];
        $caminho = "C:/xampp/htdocs/grupo2/app/public/upload/";
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminho . $foto_perfil);

        $userController = new userController($pdo);
        $userController->criarUser($_POST['nome_completo'], $_POST['nome_usuario'], $_POST['cpf'], $_POST['email'], $_POST['senha'], 0, $foto_perfil);
    }

    // Verifica se é uma submissão de formulário para atualizar um usuário
    if (isset($_POST['atualizar_nome_completo']) && isset($_POST['atualizar_nome_usuario']) && isset($_POST['atualizar_cpf']) && isset($_POST['atualizar_email']) && isset($_POST['atualizar_senha']) && isset($_POST['atualizar_adm']) && isset($_POST['id_user'])) {
        $userController = new userController($pdo);
        $userController->atualizarUser(
            $_POST['id_user'],
            $_POST['atualizar_nome_completo'],
            $_POST['atualizar_nome_usuario'],
            $_POST['atualizar_cpf'],
            $_POST['atualizar_email'],
            $_POST['atualizar_senha'],
            $_POST['atualizar_adm'],
            $_POST['atualizar_foto_perfil']
        ); // O último argumento é vazio porque não estamos atualizando a foto do perfil aqui
    }

    // Verifica se é uma submissão de formulário para deletar um usuário
    if (isset($_POST['deletar_id_user'])) {
        $userController = new userController($pdo);
        $userController->deletarUser($_POST['deletar_id_user']);
    }
    //exibir user

    if (isset($_POST['exibir_user'])) {
        $userController->exibirListausers();
    }

    $users = $userController->listarusers();
}

$userController = new userController($pdo);
$users = $userController->listarUsers();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Fit | ADM Lanche</title>
    <link rel="stylesheet" href="/grupo2/css/header.css">
    <link rel="stylesheet" href="/grupo2/css/index.css">
    <link rel="stylesheet" href="/grupo2/css/footer.css">
    <link rel="stylesheet" href="/grupo2/css/responsive-index.css">
    <link rel="shortcut icon" href="/grupo2/img/logo lunch fit.png" type="image/png">

</head>

<body>
    <header>
        <section class="main-header">
            <div class="esq">
                <div class="header-logo">
                    <a href="/grupo2/index.php"><img src="/grupo2/img/logo lunch fit.png"></a>
                </div>
            </div>
            <div class="meio">

                <ul class="header-text">
                    <li><a href="/grupo2/lanches.php">Lanches</a></li>
                    <li><a href="/grupo2/receitas.php">Receitas</a></li>
                    <li><a href="/grupo2/adm.php">ADM</a></li>
                </ul>

            </div>
            <div class="dir">
                <div class="user-icon">
                    <a href="/grupo2/login.php"><img src="/grupo2/img/user-ico.png"></a>
                </div>
            </div>
        </section>
    </header>

    <body>
        <h1>Usuários</h1>
        <form method="post" enctype="multipart/form-data">
            <select name="id_user">
                <input type="text" name="nome_completo" placeholder="Nome completo" required>
                <input type="text" name="nome_usuario" placeholder="Nome de usuário" required>
                <input type="text" name="cpf" placeholder="CPF" required>
                <input type="text" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="text" name="adm" placeholder="Adm" required>
                <input type="file" name="foto_perfil" accept="image/*">
                <button type="submit">Adicionar Usuário</button>
        </form>


        <?php
        $userController->exibirListausers();
        ?>

        <h2>Atualizar Usuário</h2>
        <form method="post">
            <select name="id_user">
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id_user']; ?>">
                        <?php echo $user['nome_completo']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="atualizar_nome_completo" placeholder="Novo nome completo" required>
            <input type="text" name="atualizar_nome_usuario" placeholder="Novo nome de usuário" required>
            <input type="text" name="atualizar_cpf" placeholder="CPF" required>
            <input type="text" name="atualizar_email" placeholder="E-mail" required>
            <input type="password" name="atualizar_senha" placeholder="Senha" required>
            <input type="text" name="adm" placeholder="Adm" required>
            <input type="file" name="atualizar_foto_perfil" accept="image/*">

            <button type="submit">Atualizar Usuário</button>
        </form>

        <h2>Excluir Usuário</h2>
        <form method="post">
            <select name="deletar_id_user">
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['id_user']; ?>">
                        <?php echo $user['nome_completo']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Excluir Usuário</button>
        </form>
        <button class="butao" id="toggleButton">Modo Noturno</button>


        <footer>

            <section class="main-footer">
                <div class="esq esq-2">
                    <div class="footer-logo">
                        <img src="/grupo2/img/logo.png">
                    </div>
                </div>

                <div class="meio">

                    <h1 class="footer-text">
                        All rights reserved by Lunch Fit©
                    </h1>

                </div>

            </section>
        </footer>

    </body>

</html>


<!--Script para dark mode-->
<script>
    document.getElementById("toggleButton").addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        var sol = document.getElementById("sol");
        var lua = document.getElementById("lua");
        if (document.body.classList.contains("dark-mode")) {
            document.getElementById("toggleButton").textContent = "Modo Claro";
            sol.style.display = "none";
            lua.style.display = "block";
        } else {
            document.getElementById("toggleButton").textContent = "Modo Noturno";
            sol.style.display = "block";
            lua.style.display = "none";
        }
    });


    if (document.body.classList.contains("dark-mode")) {
        document.getElementById("sol").style.display = "none";
        document.getElementById("lua").style.display = "block";
    } else {
        document.getElementById("sol").style.display = "block";
        document.getElementById("lua").style.display = "none";
    }
</script>