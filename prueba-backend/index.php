<?php

include 'Controller/ticketController.php';

/*
  listar tickets
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
        
        $tickets = ticketController::showTicketController($_GET['id']);     
        header("HTTP/1.1 200 OK");
        echo json_encode( $tickets  );
        exit();

    }
    else {
      
        $tickets = ticketController::showTicketController(''); 
        header("HTTP/1.1 200 OK");
        echo json_encode( $tickets );
        exit();

	}
}

// Crear un nuevo ticket
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $ticketId = ticketController::createTicketController($input);
    if($ticketId)
    {
      $input['id'] = $ticketId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

// Actualizar ticket
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $ticket = ticketController::updateTicketController($input);
    $response = ["response" => $ticket];
    header("HTTP/1.1 200 OK");
    echo json_encode($response);
    exit();
}

// Eliminar ticket
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
    $ticket = ticketController::deleteTicketController($id);
    $response = ["response" => $ticket];
	header("HTTP/1.1 200 OK");
    echo json_encode($response);
	exit();
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");