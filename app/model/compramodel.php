<?php
class compraModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar compra
    public function criarcompra( $cidade, $estado, $rua, $numero, $nome_lanche) {
        try {
            $todosPerfumes = "";

            foreach ($perfume as $key => $item) {
                $todosPerfumes .= $item['nome'] . ',';
            }

            $sql = "INSERT INTO endereco (pagamento, cidade, estado, cep, rua, numero, casa, complemento, perfume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$pagamento, $cidade, $estado, $cep, $rua, $numero, $casa, $complemento, $todosPerfumes]);

            
            return true;
        } catch (PDOException $e) {
            // Trate a exceção conforme necessário (por exemplo, logue o erro)
            return false;
        }
    }

    
    public function listarCompra() {
        $sql = "SELECT * FROM endereco";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
