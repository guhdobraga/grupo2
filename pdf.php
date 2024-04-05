<?php
include_once 'gerar_pdf.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="<?= $filename ?>" download="<?= $filename ?>">
    <button type="button">Baixar PDF</button>
</a>
</body>
</html>
