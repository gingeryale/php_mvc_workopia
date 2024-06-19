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
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
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
    public function query($query){
        try {
            $stm = $this->conn->prepare($query);
            $stm->execute();
            return $stm;
        } catch(PDOException $e) {
            throw new Exception("Query failed: {$e->getMessage()}");
        }
    }
}