<?php


class Queries{
    
    protected $pdo;
    
    
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    
    public function selectAll($table){
        
        $statement=$this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function insert($table, $parameters){
        
        
        $sql=sprintf(
            "insert into %s (%s) values (%s)",
            $table,
            
            implode(',', array_keys($parameters)),
            
            ':'. implode(', :', array_keys($parameters))                    
        );
        
        try{        
        
            $statement=$this->pdo->prepare($sql);
        
            foreach(array_keys($parameters) as $parameter){
                $statement->bindParam(':'.$parameter ,$parameters[$parameter]);
                }        
            $statement->execute();
           }catch(PDOException $e){
            
            die('Whoops! something went wrong.');
        }
    }
}