<!DOCTYPE html>
<html>

<head>
    <title>Lista de lanches</title>
</head>

<body>
    <section class="">


            <?php foreach ($catalogos as $catalogo) : ?>
                         
                                <div class="products">
                                    <?php
                                    if (!empty($catalogo['img_lanche'])) {
                                        echo '<img src="' . $catalogo['img_lanche'] . '" alt="Imagem do Lanche" width="100">';
                                    } else {
                                        echo 'Sem Imagem';
                                    }
                                    ?>
                                    <?php echo $catalogo['nome_lanche']; ?><br>
                                    <strong><?php echo $catalogo['preco']; ?> Reais</strong>
                                    <form method="post" action="lanches.php">
                                        <input type="hidden" name="id_lanche" value="<?php echo $catalogo['id_lanche']; ?>">
                                        <input type="hidden" name="nome" value="<?php echo $catalogo['nome_lanche']; ?>">
                                        <button type="submit" name="pedir">Adicionar ao carrinho</button>
                                    </form>
                                </div>
                          
                        <?php endforeach; ?>

                       </section>
</body>

</html>