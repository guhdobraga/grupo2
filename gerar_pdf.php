
<?php
require_once 'C:\xampp\htdocs\grupo2\vendor\autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

// Inclua o conteúdo HTML das páginas
ob_start();
include 'C:\xampp\htdocs\grupo2\app\views\usuario\lista.php';
$htmlPage1 = ob_get_clean();

ob_start();
include 'C:\xampp\htdocs\grupo2\app\views\lanches\lista.php';
$htmlPage2 = ob_get_clean();

ob_start();
include 'C:\xampp\htdocs\grupo2\app\views\endereco\lista.php';
$htmlPage3 = ob_get_clean();

// Concatene o conteúdo HTML
$htmlContent = $htmlPage2 . $htmlPage3;

$dompdf->loadHtml($htmlContent);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Nome do arquivo PDF gerado
$filename = 'Relatório-Grupo 2.pdf';

// Salve o PDF no servidor
$output = $dompdf->output();
file_put_contents($filename, $output);

// Link para o download automático
?>

