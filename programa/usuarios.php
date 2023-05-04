<?php
require('verifica_session.php');
require('twig_carregar.php');
require('models/Model.php');
require('models/Usuario.php');


$user = new Usuario();
$usuarios = $user->getAll();

echo $twig->render('usuarios.html',[
    'user' => $usuarios,
]);

?>