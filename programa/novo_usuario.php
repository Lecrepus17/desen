<?php
require('models/Model.php');
require('models/Usuario.php');

$nome = $_POST['nome'] ?? false;
$pass = $_POST['pass'] ?? false;
$email = $_POST['email'] ?? false;


$pass = password_hash($pass, PASSWORD_BCRYPT);

$usr = new Usuario();
$usr->create([
    'nome' => $nome,
    'email' => $email,
    'senha' => $pass,
]);

header('location: usuarios.php');


?>