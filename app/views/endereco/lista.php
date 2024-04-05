<!DOCTYPE html>
<html>
<head>
    <title>Lista de Endereços</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de Endereços</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>Id do endereço</th>				
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>Número</th>
                       
                    </tr>
                </thead>
                <?php foreach ($Ends as $End): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $End['id_endereco']; ?></td>
                            <td><?php echo $End['cidade']; ?></td>
                            <td><?php echo $End['bairro']; ?></td>
                            <td><?php echo $End['rua']; ?></td>
                            <td><?php echo $End['numero']; ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>
</body>
</html>