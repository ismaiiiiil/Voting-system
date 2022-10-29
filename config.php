<?php
    try{
    $user = 'root';
    $pass = '';
    $dns = 'mysql:host=localhost;dbname=elite;port=3306;charset=utf8';
    $db = new PDO($dns, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }
?>