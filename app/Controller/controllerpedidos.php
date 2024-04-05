<?php
require_once 'C:\xampp\htdocs\grupo2\app\model\modelpedidos.php';

class pedLancheController
{
    private $pedlanchemodel;
    public function __construct($pdo)
    {
        $this->pedlanchemodel = new pedlancheModel($pdo);
    }

    public function pedLanche($id_lanche, $nome_lanche, $nome_completo)
    {
        if ($this->pedlanchemodel->pedLanche($id_lanche, $nome_lanche, $nome_completo)) {
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

    public function exibirListapedidos($id_pedido)
    {
        $pedidos = $this->pedlanchemodel->listarLanchesPedidos($id_pedido);
        include 'C:\xampp\htdocs\grupo2\app\views\pedidos\lista.php';
    }
    
    public function exibirListatodospedidos()
    {
        $pedidos = $this->pedlanchemodel->listartodosLanchesPedidos();
        include 'C:\xampp\htdocs\grupo2\app\views\pedidos\lista.php';
    }

    public function listarHistorico() {
        return $this->pedlanchemodel->listarHistorico();
    }
}
