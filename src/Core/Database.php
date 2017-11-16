<?php

namespace Blog\Core;
use \PDO;

class Database extends PDO {

    public $dbconnection;

    public function __construct() {
        $this->dbconnection = new PDO("mysql:host=localhost;dbname=blog", 'root', 'tphw5c8H9xjb7w2v');
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
        return $sth->fetch(PDO::FETCH_ASSOC);

    }

    public function getLastInserted(string $key, string $table) {
        $sth = $this->dbconnection->prepare('SELECT * FROM ' . $table . ' WHERE id = LAST_INSERT_ID()');
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result[$key];
    }

    
}

?>