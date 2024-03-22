<!DOCTYPE html>
<html>
<head>
    <title>Lista de Lanches</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Lanches</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>id_lanche</th>			
                        <th>nome_lanche</th>
                        <th>preco</th>
                        <th>ingredientes</th>
                    </tr>
                </thead>
                <?php foreach ($Lanches as $Lanche): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $Lanche['id_lanche']; ?></td>
                            <td><?php echo $Lanche['nome_lanche']; ?></td>
                            <td><?php echo $Lanche['preco']; ?></td>
                            <td><?php echo $Lanche['ingredientes']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>