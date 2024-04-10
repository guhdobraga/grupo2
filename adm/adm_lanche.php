<?php
require_once 'C:/xampp/htdocs/grupo2/db/db.php';
require_once 'C:/xampp/htdocs/grupo2/app/Controller/controllerlanches.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo lanche
    if (isset($_POST['nome_lanche']) && isset($_POST['preco']) && isset($_POST['ingredientes']) && isset($_FILES['img_lanche'])) {
        $img_lanche = $_FILES['img_lanche']['name'];
        $caminho = "C:/xampp/htdocs/grupo2/app/public/foto_lanches/"; // Corrigindo o caminho do diretório de destino
        move_uploaded_file($_FILES['img_lanche']['tmp_name'], $caminho . $img_lanche);

        $lancheController = new LancheController($pdo);
        $lancheController->criarLanche($_POST['nome_lanche'], $_POST['preco'], $_POST['ingredientes'], $_POST['quantidade'], $img_lanche);
    }

    // Verifica se é uma submissão de formulário para atualizar um lanche
    if (isset($_POST['atualizar_nome_lanche']) && isset($_POST['atualizar_preco']) && isset($_POST['atualizar_ingredientes']) && isset($_POST['id_lanche'])) {
        $lancheController = new LancheController($pdo);

        // Verifica se um novo arquivo foi enviado antes de tentar movê-lo
        if (isset($_FILES['atualizar_img_lanche']) && $_FILES['atualizar_img_lanche']['size'] > 0) {
            $nova_img_lanche = $_FILES['atualizar_img_lanche']['name'];
            $caminho = "C:/xampp/htdocs/grupo2/app/public/foto_lanches/"; // Corrigindo o caminho do diretório de destino
            move_uploaded_file($_FILES['atualizar_img_lanche']['tmp_name'], $caminho . $nova_img_lanche);
        } else {
            $nova_img_lanche = null; // Se nenhum novo arquivo foi enviado, mantém a imagem atual do lanche
        }

        $lancheController->atualizarLanche($_POST['id_lanche'], $_POST['atualizar_nome_lanche'], $_POST['atualizar_preco'], $_POST['atualizar_ingredientes'], $_POST['atualizar_quantidade'], $nova_img_lanche);
    }

    // Verifica se é uma submissão de formulário para deletar um lanche
    if (isset($_POST['deletar_id_lanche'])) {
        $lancheController = new LancheController($pdo);
        $lancheController->deletarLanche($_POST['deletar_id_lanche']);
    }

    //exibir lanche
    if (isset($_POST['exibir_lanche'])) {
        $lancheController = new LancheController($pdo);
        $lancheController->exibirListaLanches();
    }
}

$lancheController = new LancheController($pdo);
$lanches = $lancheController->listarLanches();
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
    <h1>Lanches</h1>
    <form action="adm_lanche.php" method="post" enctype="multipart/form-data" required>
        <input type="text" name="nome_lanche" placeholder="Nome do lanche" required>
        <input type="float" name="preco" placeholder="Preço" required>
        <input type="text" name="ingredientes" placeholder="Ingredientes" required>
        <input type="float" name="quantidade" placeholder="Quantidade" required>
        <input type="file" name="img_lanche" accept="image/*" required>
        <button type="submit">Adicionar Lanche</button>
    </form>

    <?php
    $lancheController->exibirListaLanches();
    ?>

    <h2>Atualizar Lanche</h2>
    <form method="post" enctype="multipart/form-data">
        <select name="id_lanche">
            <?php foreach ($lanches as $lanche): ?>
                <option value="<?php echo $lanche['id_lanche']; ?>">
                    <?php echo $lanche['nome_lanche']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="atualizar_nome_lanche" placeholder="Novo nome do lanche" required>
        <input type="text" name="atualizar_preco" placeholder="Novo preço" required>
        <input type="text" name="atualizar_ingredientes" placeholder="Novos ingredientes" required>
        <input type="text" name="atualizar_quantidade" placeholder="Quantidade" required>
        <input type="file" name="atualizar_img_lanche" accept="image/*">
        <button type="submit">Atualizar Lanche</button>
    </form>

    <h2>Excluir Lanche</h2>
    <form method="post">
        <select name="deletar_id_lanche">
            <?php foreach ($lanches as $lanche): ?>
                <option value="<?php echo $lanche['id_lanche']; ?>">
                    <?php echo $lanche['nome_lanche']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Lanche</button>
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