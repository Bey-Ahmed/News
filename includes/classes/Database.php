<?php

class Database {
           
    const SELECTSINGLE = 1;
    const SELECTALL = 2;
    const EXECUTE = 3;
        
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=news;charset=utf8", "news_admin", "ABCD");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }

    public function queryDB($sql, $mode, $values=array()) {
        $preparedRequest = $this->pdo->prepare($sql);

        if (!empty($values)) {
            foreach ($values as $value)
                $preparedRequest->bindValue($value[0], $value[1]);
        }

        $preparedRequest->execute();

        if ($mode == self::SELECTSINGLE) {
            return $preparedRequest->fetch(PDO::FETCH_ASSOC);
        }
        else if ($mode == self::SELECTALL) {
            return $preparedRequest->fetchALL(PDO::FETCH_ASSOC);
        }
        else if ($mode != self::EXECUTE) {
            throw new Exception("Invalid Mode");
        }
    } 
}
    