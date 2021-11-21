<?php 
   include_once("MarcaDao.php");
   include_once ("Marca.php");
   session_start();
   $id = $_SESSION["id"];
   $descricao =$_POST['descricao'];        
   $marca = new Marca($descricao);
   $marcaDao = new MarcaDao();   
   $marcaDao->editarMarca($marca,$id);   

?>
