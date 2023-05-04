<?php
require('pdo.inc.php');
require('models/Model.php');
require('models/Usuario.php');

$user = $_POST['user'] ?? false;
$pass = $_POST['pass'] ?? false;

//cria aconsulta e aguarda os dados
$sql = $pdo->prepare('SELECT * FROM usuarios WHERE nome = :user AND senha = :pass');

//adiciona os dados na consulta
$sql->bindParam(':user', $user);
$sql->bindParam(':pass', $pass);

//roda consulta
$sql->execute();


//se encontrou o usuario
if($sql->rowCount()){
    //Login feito com sucesso

    $user = $sql->fetch(PDO::FETCH_OBJ);

    //Cria uma sessão para armazenar o usuário
    session_start();
    $_SESSION['user'] = $user->nome;

    //Redireciona 
    header('location: tela.php');
    die;
} else {
    //Falha no login
    header('location: login.php');
    die;
}