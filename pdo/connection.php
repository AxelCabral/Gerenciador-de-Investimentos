<?php
class connection{
    protected $pdo;

    function connect(){ // Faz a conexão com o banco de dados
        $this->pdo = new PDO("mysql:host=localhost; dbname=invest_database", "root", "");
        return $this->pdo;
    }
}
