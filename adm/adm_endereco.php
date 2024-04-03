<?php
    session_start();
    var_dump($_SESSION);
    if($_SESSION['adm'] != 1) {
        header('Location: index.php');
    }
?>


<?php
require_once 'db\db.php';
require_once 'app\Controller\controllerendereco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se é uma submissão de formulário para adicionar um novo endereço
    if (isset($_POST['rua']) && isset($_POST['bairro']) && isset($_POST['cidade']) && isset($_POST['numero'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->criarEnd($_POST['rua'], $_POST['bairro'], $_POST['cidade'], $_POST['numero']);
    }

    // Verifica se é uma submissão de formulário para atualizar um endereço
    if (isset($_POST['atualizar_rua']) && isset($_POST['atualizar_bairro']) && isset($_POST['atualizar_cidade']) && isset($_POST['atualizar_numero']) && isset($_POST['id_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->atualizarEnd($_POST['id_endereco'], $_POST['atualizar_rua'], $_POST['atualizar_bairro'], $_POST['atualizar_cidade'], $_POST['atualizar_numero']);
    }

    // Verifica se é uma submissão de formulário para deletar um endereço
    if (isset($_POST['deletar_id_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->deletarEnd($_POST['deletar_id_endereco']);
    }

    // Exibir endereços
    if (isset($_POST['exibir_endereco'])) {
        $enderecoController = new enderecoController($pdo);
        $enderecoController->exibirListaEnds($_POST['exibir_endereco']);
    }

}

$enderecoController = new enderecoController($pdo);
$enderecos = $enderecoController->ListarEnds();
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Endereços</h1>
    <form action="admendereco.php" method="post">
        <input type="text" name="rua" placeholder="Rua">
        <input type="text" name="bairro" placeholder="Bairro">
        <input type="text" name="cidade" placeholder="Cidade">
        <input type="text" name="numero" placeholder="Número">
        <button type="submit">Adicionar Endereço</button>
    </form>

    <?php
    $enderecoController->exibirListaEnds();
    ?> 

    <h2>Atualizar Endereço</h2>
    <form method="post">
        <select name="id_endereco">
            <?php foreach ($enderecos as $endereco): ?>
                <option value="<?php echo $endereco['id_endereco']; ?>"><?php echo $endereco['rua']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="atualizar_rua" placeholder="Nova rua">
        <input type="text" name="atualizar_bairro" placeholder="Novo bairro">
        <input type="text" name="atualizar_cidade" placeholder="Nova cidade">
        <input type="text" name="atualizar_numero" placeholder="Novo número">
        <button type="submit">Atualizar Endereço</button>
    </form>

    <h2>Excluir Endereço</h2>
    <form method="post">
        <select name="deletar_id_endereco">
            <?php foreach ($enderecos as $endereco): ?>
                <option value="<?php echo $endereco['id_endereco']; ?>"><?php echo $endereco['rua']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Excluir Endereço</button>
    </form>
</body>
</html>
