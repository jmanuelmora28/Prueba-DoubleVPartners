<?php

class Database
{
    protected $connection = null;

    public function __construct() {
    }

    //Abrir conexion a la base de datos
    function connect($db)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=tickets", 'root', '');

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
    }


    //Obtener parametros para actualizar
    function getParams($input)
    {
        $filterParams = [];
        foreach($input as $param => $value)
        {
                $filterParams[] = "$param=:$param";
        }
        return implode(", ", $filterParams);
    }

    //Asociar todos los parametros a un sql
    function bindAllValues($statement, $params)
    {
        foreach($params as $param => $value)
        {
                    $statement->bindValue(':'.$param, $value);
        }
        
        return $statement;
    }
    
}