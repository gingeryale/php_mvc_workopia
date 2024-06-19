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
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->conn = new PDO($dsn,$config['username'], $config['password']);
            //echo 'connected';
        } catch (PDOException $e){
            throw new Exception ("Database conncetion failed: {$e->getMessage()}");
        }
    }
}