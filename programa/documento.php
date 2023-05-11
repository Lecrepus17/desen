<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('models/Model.php');
    require('models/Documento.php');

    $id = $_GET['id'] ?? false;
// renderiza tela
$doc = new Documento();
$documento = $doc->getById($id);

// Caminho para o arquivo que será baixado
$file_path = $documento['nomeDoc'];

// Verifica se o arquivo existe antes de baixá-lo
if (file_exists($file_path)) {
    // Define o tipo de conteúdo
    header('Content-Type: application/octet-stream');

    // Define o tamanho do arquivo
    header('Content-Length: ' . filesize($file_path));

    // Define o nome do arquivo
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');

    // Faz a leitura do arquivo e envia para o navegador
    readfile($file_path);
} else {
    // Se o arquivo não existir, exibe uma mensagem de erro
    echo 'O arquivo não está disponível para download.';
}




echo $twig->render('documento.html', [
    $documento => 'documento',
      ]);
    die;
   