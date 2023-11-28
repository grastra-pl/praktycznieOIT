<?php

define ('CONNECTION_KEY','connection');

class Database {
    public static function getConnection() {
        if (array_key_exists(CONNECTION_KEY, $GLOBALS) && $GLOBALS[CONNECTION_KEY]) {
            return $GLOBALS[CONNECTION_KEY];
        }
    
        $servername = $GLOBALS['servername'];
        $username = $GLOBALS['username'];
        $dbname = $GLOBALS['dbname'];
        $password = $GLOBALS['password'];
    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_PERSISTENT => true));
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
    
        $GLOBALS[CONNECTION_KEY] = $conn;
        return $conn;
    }

    public static function query($query, $params) {
        logfile($query);
    
        if(!$params) {
            $params = [];
        }
        $conn = self::getConnection();
    
        $statement = $conn->prepare($query);
    
        try {
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);    
        } catch( PDOException $Exception ) {
            logfile($Exception->getMessage());
            return [];
        }
    }
}
