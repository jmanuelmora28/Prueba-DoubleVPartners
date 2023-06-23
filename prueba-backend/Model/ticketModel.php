<?php

require_once "database.php";

class ticketModel
{

    public static function getTicketsModel($id)
    {
        $dbConn = Database::connect($db);
        $data = array();

        if($id != ""){            
            
            $sql = $dbConn->prepare("SELECT * FROM tickets where id=:id");
            $sql->bindValue(':id', $_GET['id']);
            $sql->execute();
            $data = $sql->fetch(PDO::FETCH_ASSOC);

        }else{
            
            $sql = $dbConn->prepare("SELECT * FROM tickets");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetchAll();

        }

        return $data;
    }

    public static function createTicketModel($data)
    {
        $dbConn = Database::connect($db);
        $sql = "INSERT INTO tickets
          (usuario, status)
          VALUES
          (:usuario, :status)";
        $statement = $dbConn->prepare($sql);
        Database::bindAllValues($statement, $data);
        $statement->execute();
        $ticketId = $dbConn->lastInsertId();
        return $ticketId;
    }
    
    public static function updateTicketModel($data)
    {
        $dbConn = Database::connect($db);
        $response = '';
        $ticketId = $data['id'];
        $fields = Database::getParams($data);

        $sql = "
            UPDATE tickets
            SET $fields, fecha_actualizacion = NOW()
            WHERE id = '$ticketId'
            ";
        
        $statement = $dbConn->prepare($sql);
        Database::bindAllValues($statement, $data);

        if($statement->execute())
            $response = 'ok';
        else
            $response = 'fail';

        return $response;
    }

    public static function deleteTicketModel($id)
    {
        $dbConn = Database::connect($db);
        $response = '';
        $statement = $dbConn->prepare("DELETE FROM tickets where id=:id");
        $statement->bindValue(':id', $id);
        if($statement->execute())
            $response = 'ok';
        else
            $response = 'fail';

        return $response;
    }

}