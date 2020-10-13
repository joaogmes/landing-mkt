<?php
date_default_timezone_set('America/Sao_Paulo');
function conectaBanco($nomeBD)
{

    switch ($nomeBD) {
        case 'local':
            $hostname = 'localhost';
            $dbname = 'landing';
            $username = 'root';
            $password = '';
            break;

        case 'online':
            $hostname = '192.168.0.1';
            $dbname = 'banco2';
            $username = 'root';
            $password = 'xx1!';
            break;
    }

    try {
        $conexao = new PDO(
            "mysql:host=$hostname;dbname=$dbname",
            $username,
            $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexao;
    } catch (PDOException $e) {
        return false;
        // echo $e->getMessage();
    }
}
