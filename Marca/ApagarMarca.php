<?php 
   include_once("MarcaDao.php");
   
   session_start();
   $id = $_SESSION["id"];       
   
   $marcaDao = new MarcaDao();   
   $marcaDao->apagarDados($id);   

?>
