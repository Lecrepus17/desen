<?php



function search($resultado){
require('pdo.inc.php');
if ($timestamp = strtotime($resultado)) {
    $sql = $pdo->prepare('SELECT * FROM documentos WHERE DATE(data) = :resultado AND usuarios_idusuarios = :user');
    $resultado =  date('Y-m-d', $timestamp);
    $sql->bindParam(':resultado', $resultado);
    $sql->bindParam(':user', $_SESSION['user']);

$sql->execute();
return $sql->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $sql = $pdo->prepare('SELECT * FROM documentos WHERE nome LIKE :resultado AND usuarios_idusuarios = :user');
    $resultado = "%$resultado%";
    $sql->bindParam(':resultado', $resultado);
    $sql->bindParam(':user', $_SESSION['user']);
$sql->execute();
return $sql->fetchAll(PDO::FETCH_ASSOC);
  }
}

function search2($resultado){
    require('pdo.inc.php');
    if ($timestamp = strtotime($resultado)) {
        $sql = $pdo->prepare('SELECT compartilhamentos.iddocumentos, documentos.nome  FROM compartilhamentos join documentos on documentos.iddocumentos = compartilhamentos.iddocumentos WHERE idUserCom = :user AND DATE(data) = :resultado');
        $resultado =  date('Y-m-d', $timestamp);
        $sql->bindParam(':resultado', $resultado);
        $sql->bindParam(':user', $_SESSION['user']);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $sql = $pdo->prepare('SELECT compartilhamentos.iddocumentos, documentos.nome  FROM compartilhamentos join documentos on documentos.iddocumentos = compartilhamentos.iddocumentos WHERE idUserCom = :user AND nome LIKE :resultado');
        $resultado = "%$resultado%";
        $sql->bindParam(':resultado', $resultado);
        $sql->bindParam(':user', $_SESSION['user']);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
      }
    }




