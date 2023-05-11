<?php
    require('verifica_session.php');
    require('twig_carregar.php');
    require('func/sanitize_filename.php');
    require('func/verifica_nome_arquivo.php');
    require('models/Model.php');
    require('models/Documento.php');
    require('models/Compartilhamento.php');
    require('func/verifica_permissao.php');

    $id = $_POST['id'] ?? $_GET['view'] ?? false;
    $tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? false;

    if($tipo == 'novo'){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !$_FILES['arquivo']['error']){

        $arquivo = sanitize_filename($_FILES['arquivo']['name']);

        $arquivo = verifica_nome_arquivo('uploads/',$arquivo);
        
        $nomeDoc = 'uploads/'.$arquivo;
        
        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' . $arquivo);

        $timezone = new DateTimeZone('America/Sao_Paulo');
        $agora = new DateTime('now', $timezone);
        $data_formatada = $agora->format('Y-m-d H:i:s');

        $doc = new Documento();
        $doc->create([
            'nome' => $_POST['nome'],
            'nomeDoc' => $nomeDoc,
            'usuarios_idusuarios' => $_SESSION['user'],
            'data' => $data_formatada
            ]);
          
            header('location: documentos_lista.php');
    }else{
    echo $twig->render('documentos_novo.html', ['tipo' => 'novo']);
}}elseif($tipo == 'altera'){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $doc = new Documento();
        $documento = $doc->getById($id);
        $comp = new Compartilhamento();
        $compartilhamento = $comp->getByIdComp($_SESSION['user']);
        $ver = verifica_permissao($documento, $compartilhamento);

        if($ver >=2){
        if($_FILES['arquivo']['name']){
        $arquivo = sanitize_filename($_FILES['arquivo']['name']);
        $arquivo = verifica_nome_arquivo('uploads/',$arquivo);
        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' . $arquivo);
        $nomeDoc = 'uploads/'.$arquivo;
        }else{
            $nomeDoc = $_POST['docsalvo'];
        }
        $doc = new Documento();
        $doc->update([
            'nome' => $_POST['nome'],
            'nomeDoc' => $nomeDoc,
        ], $id);
        header('location: documentos_lista.php');}else{header('location: documentos_part.php');}
    }else{
        $doc = new Documento();
        $documento = $doc->getById($id);  
        echo $twig->render('documentos_novo.html', ['tipo' => 'altera', 'doc' => $documento]);   
    }
}

