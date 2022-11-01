<?php

class DB {
    static public function connect(){
        try{
            $user = 'root';
            $pass = '';
            $dns = 'mysql:host=localhost;dbname=elite;port=3306;charset=utf8';
            $db = new PDO($dns, $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
            }
    }
}


?>