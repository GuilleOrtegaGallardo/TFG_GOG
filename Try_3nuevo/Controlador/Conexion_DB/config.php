<?php 

    define('DB_HOST','localhost:3306');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','labprueba2');

    $hostDB = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";";

    try{
        $connectDB = new PDO($hostDB,DB_USER,DB_PASSWORD);
        $connectDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: No se pudo conectar a la base de datos ".$e->getMessage());
    }


?>