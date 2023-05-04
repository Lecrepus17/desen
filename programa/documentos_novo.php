<?php
    require('twig_carregar.php');
    require('func/sanitize_filename.php');
    require('func/verifica_nome_arquivo.php');
    require('models/Model.php');
    require('models/Documento.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !$_FILES['arquivo']['error']){

        $arquivo = sanitize_filename($_FILES['arquivo']['name']);

        $arquivo = verifica_nome_arquivo('uploads/',$arquivo);
        
        $nomeDoc = 'uploads/'.$arquivo;
        
        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' . $arquivo);

        $doc = new Documento();
        $doc->create([
            'nome' => $_POST['nome'],
            'nomeDoc' => $nomeDoc,
            'usuarios_idusuarios' => 1
            ]);


    }


    echo $twig->render('documentos_novo.html');


    
