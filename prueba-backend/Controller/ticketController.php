<?php

include 'Model/ticketModel.php';

class ticketController {    

    public static function createTicketController($data){
        return ticketModel::createTicketModel($data);
    }

    public static function showTicketController($id){
        return ticketModel::getTicketsModel($id);
    }

    public static function updateTicketController($data){
        return ticketModel::updateTicketModel($data);
    }

    public static function deleteTicketController($id){
        return ticketModel::deleteTicketModel($id);
    }


}