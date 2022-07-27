<?php
    $dsn = "mysql:dbname=software;host=10.82.11.61";
    $dbuser = "root";
    $dbpassword = "01root@ceal.*";

    try{
        $pdo = new PDO($dsn, $dbuser, $dbpassword);
        
    } catch(PDOException $e){
        echo "Falha na conexão: ".$e->getMessage();
    }
?>