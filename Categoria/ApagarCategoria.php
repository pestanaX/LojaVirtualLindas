<?php 
   include_once("CategoriaDao.php");
   include_once ("Categoria.php");
   session_start();
   $id = $_SESSION["id"];       
   
   $categoriaDao = new CategoriaDao();   
   $categoriaDao->apagarDados($id);   

?>
