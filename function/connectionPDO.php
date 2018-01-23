<?php
function connectionPDO() {
    $dsn ="mysql:dbname=nfactoryblog;host=localhost;charset=utf8";
    $username = "root";
    $password ="";
    try{
        $db = new PDO($dsn, $username, $password);

    }
    catch (PDOException $e){
        echo $e->getMessage();

    }
        return $db;
}