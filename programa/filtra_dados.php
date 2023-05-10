<?php
require('pdo.inc.php');
require('twig_carregar.php');


$resultado = $_POST['pesquisa'];

$sql = $pdo->prepare('SELECT * FROM documentos WHERE nome = :resultado');
$sql->bindParam(':resultado', $resultado);
$sql->execute();

$result = $sql->fetch(PDO::FETCH_ASSOC);

if($sql){
    $id = $result->iddocumentos;
    header("location: documentos_lista.php".$id);
}else{
    header('location: documentos_lista.php');
}



?>