

<!DOCTYPE html>
<html>
<head>
    <title>Lista de lanches</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de lanches</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>id_lanche</th>			
                        <th>nome_lanche</th>
                        <th>preco</th>
                        <th>ingredientes</th>
                    </tr>
                </thead>
                <?php foreach ($lanches as $lanche): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $lanche['id_lanche']; ?></td>
                            <td><?php echo $lanche['nome_lanche']; ?></td>
                            <td><?php echo $lanche['preco']; ?></td>
                            <td><?php echo $lanche['ingredientes']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>