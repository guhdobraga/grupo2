<?php
include_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de lanches</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de lanches</h1></legend>
            <table border="1" width="500px">
                <thead>
                    <tr>
                        <th>id do lanche</th>			
                        <th>Nome do lanche</th>
                        <th>Preço</th>
                        <th>Ingredientes</th>
                        <th>Imagem</th>
                    </tr>
                </thead>
                <?php foreach ($lanches as $lanche): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $lanche['id_lanche']; ?></td>
                            <td><?php echo $lanche['nome_lanche']; ?></td>
                            <td><?php echo $lanche['preco']; ?></td>
                            <td><?php echo $lanche['ingredientes']; ?></td>
                           <td><img src="<?= "../../grupo2/app/public/foto_lanches/".$lanche['img_lanche']; ?>" alt="imagem lanche" width="100px"></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>