<?php
class Database{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;
    private $stmt;
    function __construct() {
        $dsn = "mysql:host=$this->dbHost;dbname=$this->dbName";
        try {
            $this->dbHandler = new PDO($dsn, $this->dbUser, $this->dbPass, [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            // echo 'success';
        } catch(PDOException $er) {
            exit($er->getMessage());
        }
    }
    function query($sql) {
        $this->stmt = $this->dbHandler->prepare($sql);
    }
    function binVal($param, $value) {
        $this->stmt->bindValue($param, $value);
    }
    function execQuery() {
        return $this->stmt->execute();
    }
}