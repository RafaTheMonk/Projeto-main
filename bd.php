<?php
function connect()
{
    $host = "localhost";
    $bd_name = "agencia";
    $user = "root";
    $pass = "";

    try {
        $db = new PDO("mysql:host=$host;dbname=$bd_name", "$user", "$pass");
        return $db;
    } catch (PDOException $err) {
        echo 'Erro: ' . $err->getMessage();
    }
}
