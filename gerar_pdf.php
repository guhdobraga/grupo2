
<?php
require_once 'C:\xampp\htdocs\grupo2\vendor\autoload.php';
require_once 'C:\xampp\htdocs\grupo2\db\db.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerusuarios.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerlanches.php';
require_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerpedidos.php';
$usuarioController = new userController($pdo);
$lanchesController = new lancheController($pdo);
$pedidosController = new pedLancheController($pdo);

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

// Inclua o conteúdo HTML das páginas
ob_start();
$usuario = $usuarioController->exibirListausers();
$htmlPage1 = ob_get_clean();

ob_start();
$lanches = $lanchesController->exibirListaLanches();
$htmlPage2 = ob_get_clean();

ob_start();
$pedidos = $pedidosController->exibirListatodospedidos();
$htmlPage3 = ob_get_clean();

// Concatene o conteúdo HTML
$htmlContent = $htmlPage1 . $htmlPage2 . $htmlPage3;

$dompdf->loadHtml($htmlContent);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

// Nome do arquivo PDF gerado
$filename = 'Relatório-Grupo.pdf';

// Salve o PDF no servidor
$output = $dompdf->output();
file_put_contents($filename, $output);

// Link para o download automático
?>

