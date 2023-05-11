<?php

class Model{
    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'programa';
    private $port = '3306';
    private $user = 'root';
    private $password = null;

    protected $table;
    protected $conex;

    public function __construct(){
        $tbl = strtolower(get_class($this));
        $tbl .='s';
        $this->table = $tbl;
        $this->conex = new PDO("{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbname}", $this->user,$this->password);
    }
    public function getAll($where = false, $where_glue = 'AND'){
        if ($where) {
            $where_sql = $this->where_fields($where, $where_glue);
            $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE {$where_sql}");
            $sql->execute($where);
        }   else{
        $sql = $this->conex->query("SELECT * FROM {$this->table}");
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){                                        
        $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE iddocumentos = :id");
        
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id){                                        
        $sql = $this->conex->prepare("DELETE FROM {$this->table} WHERE iddocumentos = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){                                           
    $sql = "INSERT INTO {$this->table}";
    $sql_fields = $this->sql_fields($data);
    $sql .= " SET {$sql_fields}";
    $insert = $this->conex->prepare($sql);

   // foreach ($data as $field => $value){
   //     $insert->bindValue(":{$field}", $value);
   // }
    
    $insert->execute($data);
    return $insert->errorInfo();
    }

    public function update($data, $id){
        unset($data['id']);
        $sql = "UPDATE {$this->table}";
        $sql .= ' SET ' . $this->sql_fields($data);
        $sql .= " WHERE iddocumentos = :id";
        $data['id'] = $id;
        $upd = $this->conex->prepare($sql);
        $upd->bindParam(':id', $id);       
        $upd->execute($data);
    }

    public function map_fields($data){
        foreach (array_Keys($data) as $field ){
            $sql_fields[] = "{$field} = :{$field}";
        }     
        return $sql_fields;

    }
    public function sql_fields($data){
        
        $sql_fields = $this->map_fields($data);
        return implode(', ', $sql_fields);

    }
    public function where_fields($data, $glue = 'AND'){
        $glue = $glue == 'OR' ? ' OR ' : ' AND '; 
        $sql_fields = $this->map_fields($data);
        return implode($glue, $sql_fields);

    }

    
}



