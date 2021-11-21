<?php
     include_once("ClienteDao.php");
     session_start();
     $clienteDao = new ClienteDao();
     $clienteDao->mostrarTodosCliente();   

?>
