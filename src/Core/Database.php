<?php

namespace Blog\Core;

class Database {

    protected $dbconnection;

    public function __construct() {
        $this->dbconnection = new \PDO("mysql:host=localhost;dbname=blog", 'root', 'root');
    }

    public function query(string $sql, array $params = []) {
        $sth = $this->dbconnection->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();
    }

}

?>