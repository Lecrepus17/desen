<?php
require('pdo.inc.php');

$user = $_POST['user'] ?? false;
$pass = $_POST['pass'] ?? false;

//cria aconsulta e aguarda os dados
$sql = $pdo->prepare('SELECT * FROM usuarios WHERE nome = :user');

//adiciona os dados na consulta
$sql->bindParam(':user', $user);
//roda consulta
$sql->execute();


//se encontrou o usuario
if($sql->rowCount()){
    //Login feito com sucesso

    $user = $sql->fetch(PDO::FETCH_OBJ);

    if(!password_verify($pass, $user->senha)){
        header('location: login.php');
        die;
        }

    //Cria uma sessão para armazenar o usuário
    session_start();
    $_SESSION['user'] = $user->idusuarios;
    //Redireciona 
    header('location: tela.php');
    die;
} else {

    //Falha no login
    //header('location: login.php');
    die;
}

