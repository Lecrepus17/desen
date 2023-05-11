<?php

function verifica_pesmissao($comp){
    if($comp['visualizar'] == '1'){
        $permissao = 1;
        return $permissao;

        }elseif($comp['alterar'] == '2'){
            $permissao = 2;
            return $permissao;

        }elseif($comp['excluir'] == '3'){
        $permissao = 3;
        return $permissao;
    }
}


?>