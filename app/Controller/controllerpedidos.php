<?php
require_once 'C:\xampp\htdocs\grupo2\app\model\modelpedidos.php';

class pedLancheController
{
    private $pedlanchemodel;
    public function __construct($pdo)
    {
        $this->pedlanchemodel = new pedlancheModel($pdo);
    }

    public function pedLanche($id_user, $carrinho, $id_endereco)
    {
        $itens_pedido = '';
        $valor_pedido = 0;

        for($i=0; $i<count($carrinho); $i++){
            if($i == 0) {
                $itens_pedido .= $carrinho[$i]['nome_lanche'];
                $valor_pedido = $valor_pedido + ($carrinho[$i]['quantidade'] * $carrinho[$i]['preco']);
                
            } else {
                $itens_pedido .= ",".$carrinho[$i]['nome_lanche'];
                $valor_pedido = $valor_pedido + ($carrinho[$i]['quantidade'] * $carrinho[$i]['preco']);
            }
        }

        if ($this->pedlanchemodel->pedLanche($itens_pedido, $valor_pedido, $id_user, $id_endereco)) {
            header('Location: pedidos.php');
            exit();
        } else {
            echo 'Erro ao realizar o pedido.';
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
