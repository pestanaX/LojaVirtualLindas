<?php 
   
   include_once("Marca.php");
   include_once ("MarcaDao.php") ;
   
   session_start ();
 
      
   $descricao = $_POST['Descricao'];
  
   $marca =new Marca($descricao);
   
   $marcaDao = new MarcaDao();
   $marcaDao->gravarDados($marca); 
   
?>
