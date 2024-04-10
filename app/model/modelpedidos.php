<?php

class pedlancheModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function pedLanche($id_lanche, $nome_lanche, $preco, $quantidade)
    {
        $consultaLanche = $this->pdo->prepare("SELECT quantidade FROM pedidos WHERE id_lanche = ?");
        $consultaLanche->execute([$id_lanche]);
        $lanche = $consultaLanche->fetch(PDO::FETCH_ASSOC);

        $inserirPedido = $this->pdo->prepare("INSERT INTO pedidos (id_lanche, nome_lanche, preco, quantidade) VALUES (?, ?, ?, ?)");
        $inserirPedido->execute([$id_lanche, $nome_lanche, $preco, $quantidade]);

        return true;
    }



    public function cancelarPedido($id_pedido)
    {
        $consultaPedido = $this->pdo->prepare("SELECT id_lanche, nome_lanche, preco, quantidade FROM pedidos WHERE id_pedido = ?");
        $consultaPedido->execute([$id_pedido]);
        $pedido = $consultaPedido->fetch(PDO::FETCH_ASSOC);

        if ($pedido) {
            $id_lanche = $pedido['id_lanche'];
            $nome_lanche = $pedido['nome_lanche'];
            $preco = $pedido['preco'];
            $quantidade = $pedido['quantidade'];
    

            $this->registrarHistorico($id_pedido, $id_lanche, $nome_lanche, $preco, $quantidade);

            $excluirPedido = $this->pdo->prepare("DELETE FROM pedidos WHERE id_pedido = ?");
            $excluirPedido->execute([$id_pedido]);

            return true;
        }
    }


    public function listarLanchesPedidos($nome_completo)
    {
        $consultaLanchesPedidos = $this->pdo->prepare("SELECT * FROM pedidos WHERE nome_completo = ?");
        $consultaLanchesPedidos->execute([$nome_completo]);

        return $consultaLanchesPedidos->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listartodosLanchesPedidos()
    {
        $consultaLanchesPedidos = $this->pdo->query("SELECT * FROM pedidos");
        $consultaLanchesPedidos->execute();

        return $consultaLanchesPedidos->fetchAll(PDO::FETCH_ASSOC);
    }

    private function registrarHistorico($id_pedido, $id_lanche, $nome_lanche, $preco, $quantidade, )
    {
        $inserirHistorico = $this->pdo->prepare("INSERT INTO historico (id_pedido, nome_lanche, preco, quantidade) VALUES (?, ?, ?, ?, ?)");
        $inserirHistorico->execute([$id_pedido, $id_lanche, $nome_lanche, $preco, $quantidade]);
        $dataRegistrada = $this->pdo->query("SELECT hora FROM historico WHERE id_pedido = $id_pedido")->fetchColumn();
    }

    public function listarHistorico()
    {
        $sql = "SELECT * FROM historico";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
