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
                        <th>id do pedido</th>			
                        <th>nome dos lanches</th>
                        <th>preço</th>
                    </tr>
                </thead>
                <?php foreach ($pedidos as $pedido): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $pedido['id_pedido']; ?></td>
                            <td><?php echo $pedido['nome_lanche']; ?></td>
                            <td><?php echo $pedido['preco']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>