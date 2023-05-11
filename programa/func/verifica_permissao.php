<?php

function verifica_pesmissao($id){
    if('excluir' == '1'){
        require('pdo.inc.php');
        $sql = $pdo->prepare('DELETE FROM documentos WHERE iddocumentos = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
    }
}


?>