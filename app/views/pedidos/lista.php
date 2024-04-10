<?php
include_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Peiddos</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Pedidos</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID do pedido</th>			
                        <th>Nome dos lanches</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <?php foreach ($pedidos as $pedido): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $pedido['id_pedido']; ?></td>
                            <td><?php echo $pedido['nome_lanche']; ?></td>
                            <td><?php echo $pedido['preco']; ?></td>
                            <td><?php echo $pedido['quantidade']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>