<?php

class Compartilhamento extends Model{
    public function getIdDoc($where, $where_glue = 'AND'){ 
        $where_sql = $this->where_fields($where, $where_glue);                                       
        $sql = $this->conex->prepare("SELECT iddocumentos FROM {$this->table} WHERE {$where_sql}");
       
        $sql->execute($where);
        return $sql->fetchALL(PDO::FETCH_ASSOC);
    }
    public function getByIdComp($id){                                        
        $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE iddocumentos = :id AND idUserCom = :comp");
        
        $sql->bindParam(':id', $id);
        $sql->bindParam(':comp', $_SESSION['user']);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

}   


 