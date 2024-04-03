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
                        <th>id lanche</th>			
                        <th>nome do lanche</th>
                        <th>preço</th>
                        <th>ingredientes</th>
                        <th>imagem do lanche</th>
                    </tr>
                </thead>
                <?php foreach ($Lanches as $Lanche): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $Lanche['id_lanche']; ?></td>
                            <td><?php echo $Lanche['nome_lanche']; ?></td>
                            <td><?php echo $Lanche['preco']; ?></td>
                            <td><?php echo $Lanche['ingredientes']; ?></td>
                            <td><img src="../../public/upload/lanches/<?php echo $Lanche['img_lanche']; ?>" alt="imagem lanche" width="100px"></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>