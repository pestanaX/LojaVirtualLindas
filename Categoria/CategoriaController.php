<?php 
   
   include_once("Categoria.php");
   include_once ("CategoriaDao.php") ;
   
   session_start ();
 
      
   $descricao = $_POST['Descricao'];
  
   $categoria =new Categoria($descricao);
   
   $categoriaDao = new CategoriaDao();
   $categoriaDao->gravarDados($categoria); 
   
?>
