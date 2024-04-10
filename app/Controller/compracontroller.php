<?php
require_once 'C:\xampp\htdocs\grupo2\app\model\compramodel.php';

class compraController {
    private $compraModel;

    public function __construct($pdo) {
        $this->compraModel = new compraModel($pdo);
    }

    public function criarcompra($pagamento, $cidade, $estado, $cep, $rua, $numero, $casa, $complemento, $perfume) {
        
        $result = $this->compraModel->criarcompra($pagamento, $cidade, $estado, $cep, $rua, $numero, $casa, $complemento, $perfume);
        if ($result) {
            $_SESSION['mensagem'] = 'Compra realizada com sucesso';
            
        } else {
            $_SESSION['mensagem'] = 'Erro ao realizar a compra';
        }
    }

    public function listarcompra() {
        return $this->compraModel->listarcompra();
    }

    public function exibirlistacompra() {
        $compras = $this->compraModel->listarcompra();
        include 'C:\xampp\htdocs\Perfumaria-main\Perfumaria-main\SS\App\View\lista.php';
    }
}
