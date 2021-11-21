<?php 
   include_once("CategoriaDao.php");
   include_once ("Categoria.php");
   session_start();
   $id = $_SESSION["id"];
   $descricao =$_POST['descricao'];        
   $categoria = new Categoria($descricao);
   $categoriaDao = new CategoriaDao();   
   $categoriaDao->editarCategoria($categoria,$id);   

?>
