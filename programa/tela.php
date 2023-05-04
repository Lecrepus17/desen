<?php
require('verifica_session.php');
require('twig_carregar.php');


echo $twig->render('tela.html', [
    'user' => $_SESSION['user'],
]);

