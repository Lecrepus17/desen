<?php

function verifica_permissao($doc, $comp = false){
    if($comp['visualizar'] == '1'  OR $_SESSION['user'] = $doc['usuarios_idusuarios']){
        $permissao = 1;
        return $permissao;

        }elseif($comp['alterar'] == '2'  OR $_SESSION['user'] = $doc['usuarios_idusuarios']){
            $permissao = 2;
            return $permissao;

        }elseif($comp['excluir'] == '3' OR $_SESSION['user'] = $doc['usuarios_idusuarios']){
        $permissao = 3;
        return $permissao;
    }
}


?>
