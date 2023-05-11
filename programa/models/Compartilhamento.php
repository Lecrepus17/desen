<?php

class Compartilhamento extends Model{
    public function getIdDoc($where, $where_glue = 'AND'){ 
        $where_sql = $this->where_fields($where, $where_glue);                                       
        $sql = $this->conex->prepare("SELECT iddocumentos FROM {$this->table} WHERE {$where_sql}");
       
        $sql->execute($where);
        return $sql->fetchALL(PDO::FETCH_ASSOC);
    }

}   


 