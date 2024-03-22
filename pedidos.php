<?php

require_once 'db/db.php';
require_once 'app/controller/controllerlanches.php';
require_once 'app/controller/controllerpedidos.php';



session_start();

// Verifique se o usuário já está logado e redirecione-o para a página apropriada
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php"); // Redirecione para a página de dashboard ou outra página após o login
    exit();
}

include_once('db/config.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
}

$lancheController = new lancheController($pdo);
$pedlancheController = new pedLancheController($pdo);



/*
$lanches = $lancheController->listarlanches();

$booksPorgenero = [];
foreach ($books as $book) {
    $genero = $book['genero'];
    if (!isset($booksPorgenero[$genero])) {
        $booksPorgenero[$genero] = [];
    }
    $booksPorgenero[$genero][] = $book;
}*/



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pedir'])) {
    $id_lanche = $_POST['id_lanche'];
    $nome_lanche = $_POST['nome_lanche'];
    $preco = $_POST['preco'];
    $nome_completo = $_SESSION['nome_completo'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $quantidade = $_POST['quantidade'];


    $pedlancheController->pedLanche($id_lanche, $nome_lanche, $preco, $nome_completo, $rua, $numero, $quantidade);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelar'])) {
    $id_lanche = $_POST['id_lanche'];

    $pedlancheController->cancelarPedido($id_pedido);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos do Usuário</title>
</head>

<body>
    <header>

    </header>

    <section>
        <h4>Pedidos</h4><br>
        <ul>
            <?php $lanchesPedidos = $pedlancheController->listarLanchesPedidos($_SESSION['nome_completo']); ?>
            <?php foreach ($lanchesPedidos as $pedido) : ?>
                <li>
                    <?php echo "<strong>Id do lanche: </strong>" . $pedido['id_lanche']; ?> <br>
                    <?php echo "<strong>Lanche: </strong>" . $pedido['nome_lanche']; ?> <br>
                    <?php echo "<strong>Preço Unitário: </strong>" . $pedido['preco']; ?>
                    <?php echo "<strong>Nome do Usuário: </strong>" . $pedido['nome_completo']; ?>
                    <?php echo "<strong>Rua: </strong>" . $pedido['rua']; ?>
                    <?php echo "<strong>Número: </strong>" . $pedido['numero']; ?>
                    <?php echo "<strong>Quantidade: </strong>" . $pedido['quantidade']; ?>
                    <form method="post" action="lanche.php">
                        <input type="hidden" name="id_lache" value="<?php echo $pedido['id_pedido']; ?>">
                        <button type="submit" name="cancelar">Cancelar Pedido</button><br><br>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>



    <footer>

    </footer>

</body>

</html>