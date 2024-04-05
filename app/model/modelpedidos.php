<?php

class pedlancheModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function pedLanche($id_lanche, $nome_lanche, $nome_completo)
    {
        $consultaLanche = $this->pdo->prepare("SELECT quantidade FROM pedidos WHERE id_lanche = ?");
        $consultaLanche->execute([$id_lanche]);
        $lanche = $consultaLanche->fetch(PDO::FETCH_ASSOC);

        $inserirPedido = $this->pdo->prepare("INSERT INTO pedidos (id_lanche, nome_lanche, nome_completo, data) VALUES (?, ?, ?, NOW())");
        $inserirPedido->execute([$id_lanche, $nome_lanche, $nome_completo]);

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

    private function registrarHistorico($id_pedido, $id_lanche, $nome_lanche, $preco, $nome_completo, $rua, $numero, $quantidade)
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
