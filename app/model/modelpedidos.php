<?php

class pedlancheModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function pedLanche($itens_pedido, $valor_pedido, $id_user, $id_endereco)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dataEhoraAtual = date("Y-m-d H:i:s");

        $inserirPedido = $this->pdo->prepare("INSERT INTO pedidos (itens_pedido, valor_pedido, id_user, id_endereco, data) VALUES (?, ?, ?, ?, ?)");
        $inserirPedido->execute([$itens_pedido, $valor_pedido, $id_user, $id_endereco, $dataEhoraAtual]);

        unset($_SESSION['carrinho']);
        $_SESSION['carrinho'] = array();
        return true;
    }



    public function cancelarPedido($id_pedido)
    {
        $consultaPedido = $this->pdo->prepare("SELECT id_lanche, nome_lanche, nome_completo FROM pedidos WHERE id_pedido = ?");
        $consultaPedido->execute([$id_pedido]);
        $pedido = $consultaPedido->fetch(PDO::FETCH_ASSOC);

        if ($pedido) {
            $id_lanche = $pedido['id_lanche'];
            $nome_lanche = $pedido['nome_lanche'];
            $nome_completo = $pedido['nome_completo'];
    
            
            $consultaLanche = $this->pdo->prepare("SELECT quantidade FROM lanches WHERE id_lanche = ?");
            $consultaLanche->execute([$id_lanche]);
            $lanche = $consultaLanche->fetch(PDO::FETCH_ASSOC);


            $this->registrarHistorico($id_pedido, $id_lanche, $nome_lanche, $nome_completo);

            $excluirPedido = $this->pdo->prepare("DELETE FROM pedidos WHERE id_pedido = ?");
            $excluirPedido->execute([$id_pedido]);

            return true;
        }
    }


    public function listarLanchesPedidos($id_user)
    
    {
        $consultaLanchesPedidos = $this->pdo->prepare("SELECT p.*, c.nome_cidade, e.*, u.* FROM pedidos p
        INNER JOIN endereco e ON p.id_endereco = e.id_endereco
        INNER JOIN cidade c ON e.id_cidade = c.id_cidade
        INNER JOIN users u ON p.id_user = u.id_user
        WHERE p.id_user = ?");
        $consultaLanchesPedidos->execute([$id_user]);

        return $consultaLanchesPedidos->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listartodosLanchesPedidos()
    {
        $consultaLanchesPedidos = $this->pdo->query("SELECT * FROM pedidos");
        $consultaLanchesPedidos->execute();

        return $consultaLanchesPedidos->fetchAll(PDO::FETCH_ASSOC);
    }

    private function registrarHistorico($id_pedido, $id_lanche, $nome_lanche, $nome_completo)
    {
        $inserirHistorico = $this->pdo->prepare("INSERT INTO historico (id_pedido, nome_lanche, nome_completo) VALUES (?, ?, ?)");
        $inserirHistorico->execute([$id_pedido, $id_lanche, $nome_lanche, $nome_completo]);
        $dataRegistrada = $this->pdo->query("SELECT hora FROM historico WHERE id_pedido = $id_pedido")->fetchColumn();
    }

    public function listarHistorico()
    {
        $sql = "SELECT * FROM historico";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
