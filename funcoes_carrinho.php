<?php

session_start();


function adicionarAoCarrinho($id_lanche, $nome_lanche, $preco, $quantidade)
{
 
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

  
    $lancheExistente = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['id_lanche'] == $id_lanche) {
            $item['quantidade'] += $quantidade;
            $lancheExistente = true;
            break;
        }
    }


    if (!$lancheExistente) {
        $novoItem = array(
            'id_lanche' => $id_lanche,
            'nome_lanche' => $nome_lanche,
            'preco' => $preco,
            'quantidade' => $quantidade
        );
        $_SESSION['carrinho'][] = $novoItem;
    }
}


function recuperarItensDoCarrinho()
{

    if (isset($_SESSION['carrinho'])) {
        return $_SESSION['carrinho'];
    } else {
        return array();
    }
}


function removerDoCarrinho($id_lanche)
{

    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $index => $item) {
            if ($item['id_lanche'] == $id_lanche) {
                unset($_SESSION['carrinho'][$index]);
                $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
                break;
            }
        }
    }
}

