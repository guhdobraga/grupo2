<?php
require_once 'app/model/modelpedidos.php';

class pedLancheController
{
    private $pedlanchemodel;
    public function __construct($pdo)
    {
        $this->pedlanchemodel = new pedlancheModel($pdo);
    }

    public function pedLanche($id_lanche, $nome_lanche, $preco, $nome_completo, $rua, $numero, $quantidade)
    {
        if ($this->pedlanchemodel->pedLanche($id_lanche, $nome_lanche, $preco, $nome_completo, $rua, $numero, $quantidade)) {
            header('Location: lanche.php');
            exit();
        } else {
            echo 'Não foi possível realizar o pedido.';
        }
    }

    public function cancelarPedido($id_pedido)
    {
        if ($this->pedlanchemodel->cancelarPedido($id_pedido)) {
            header('Location: lanche.php');
            exit();
        } else {
            echo "Lamentamos, mas não foi possível realizar o cancelamento do seu pedido :(";
        }
    }
    public function listarLanchesPedidos($id_pedido)
    {
        return $this->pedlanchemodel->listarLanchesPedidos($id_pedido);
    }

    public function listarHistorico() {
        return $this->pedlanchemodel->listarHistorico();
    }
}
