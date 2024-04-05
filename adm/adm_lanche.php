<?php
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo lanche
    if (isset($_POST['nome_lanche']) && isset($_POST['preco']) && isset($_POST['ingredientes']) && isset($_FILES['img_lanche'])) {
        $img_lanche = $_FILES['img_lanche']['name'];
        $caminho = "C:/xampp/htdocs/grupo2/app/public/foto_lanches/"; // Corrigindo o caminho do diretório de destino
        move_uploaded_file($_FILES['img_lanche']['tmp_name'], $caminho . $img_lanche);

        $lancheController = new LancheController($pdo);
        $lancheController->criarLanche($_POST['nome_lanche'], $_POST['preco'], $_POST['ingredientes'], $img_lanche);
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

        $lancheController->atualizarLanche($_POST['id_lanche'], $_POST['atualizar_nome_lanche'], $_POST['atualizar_preco'], $_POST['atualizar_ingredientes'], $nova_img_lanche);
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
<html>

<body>
    <h1>Lanches</h1>
    <form action="adm_lanche.php" method="post" enctype="multipart/form-data" required>
        <input type="text" name="nome_lanche" placeholder="Nome do lanche" required>
        <input type="text" name="preco" placeholder="Preço" required>
        <input type="text" name="ingredientes" placeholder="Ingredientes" required>
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
</body>

</html>
