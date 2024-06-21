<?php

class Database{
    public $conn;

    /**
     * CONSTRUCTOR for DATABASE class
     * @param array $config
     */

    public function __construct($config){
        $dsn="mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $options=[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
            // could use fetch object PDO::FETCH_OBJ and then use $litings->name
            // could use fetch object PDO::FETCH_ASSOC and then use $litings['name']
        ];
        try{
            $this->conn = new PDO($dsn,$config['username'], $config['password'],$options);
        } catch (PDOException $e){
            throw new Exception ("Database conncetion failed: {$e->getMessage()}");
        }
    }

    /** QUERY DB
     * @param sting $query
     * @return PDOStatement
     * @thorw PDOException
     */
    public function query($query, $parama=[]){
        try {
            $stm = $this->conn->prepare($query);
            //bind params to query
            foreach($paramas as $param=>$value){
                $stm->bindValue();
            }
            $stm->execute();
            return $stm;
        } catch(PDOException $e) {
            throw new Exception("Query failed: {$e->getMessage()}");
        }
    }
}