<?php

namespace Blog\Core;

class Database {

    protected $dbconnection;

    public function __construct() {
        $this->dbconnection = new \PDO("mysql:host=localhost;dbname=blog", 'root', 'root');
    }

    public function query(string $sql, array $params = []) {
        $sth = $this->dbconnection->prepare($sql);
        $result = $sth->execute($params);
        return $sth->fetchAll();
    }

    public function createOne(string $sql, array $params = []) {
        $sth = $this->dbconnection->prepare($sql);
        $result = $sth->execute($params);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function readOne(string $sql, array $params = []) {
        $sth = $this->dbconnection->prepare($sql);
        $sth->execute($params);
        return $sth->fetch(\PDO::FETCH_ASSOC);

    }

    public function escape(string $string) {
        $escapedString = $this->dbconnection->quote($string);
        return $escapedString;
    }

    // public function readOne(string $sql, array $params = []) {
    //     $sth = $this->dbconnection->prepare($sql);
    //     $sth->execute($params);
    //     return $sth->fetch(\PDO::FETCH_ASSOC);
    // }

    
}

?>