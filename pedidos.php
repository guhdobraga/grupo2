<?php

include_once('C:\xampp\htdocs\grupo2\db\db.php');
include_once('C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php');
include_once('C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php');


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
        <button class="butao" id="toggleButton">Modo Noturno</button>
    </section>



    <footer>

    </footer>

</body>

</html>


<!--Script para dark mode-->
<script>
document.getElementById("toggleButton").addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
    var sol = document.getElementById("sol");
    var lua = document.getElementById("lua");
    if (document.body.classList.contains("dark-mode")) {
        document.getElementById("toggleButton").textContent = "Modo Claro";
        sol.style.display = "none"; // Oculta o sol no modo noturno
        lua.style.display = "block"; // Mostra a lua no modo noturno
    } else {
        document.getElementById("toggleButton").textContent = "Modo Noturno";
        sol.style.display = "block"; // Mostra o sol no modo claro
        lua.style.display = "none"; // Oculta a lua no modo claro
    }
});

// Verifica o modo atual ao carregar a página
if (document.body.classList.contains("dark-mode")) {
    document.getElementById("sol").style.display = "none"; // Oculta o sol no modo noturno
    document.getElementById("lua").style.display = "block"; // Mostra a lua no modo noturno
} else {
    document.getElementById("sol").style.display = "block"; // Mostra o sol no modo claro
    document.getElementById("lua").style.display = "none"; // Oculta a lua no modo claro
}



</script>