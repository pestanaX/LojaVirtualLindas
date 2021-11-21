<html lang ="pt-br">
<head>
<meta charset=utf-8">
<title>Formulario Do Administrador</title>
</head>
    <body>   
    <?php
     include_once ("CategoriaDao.php");
     include_once("Categoria.php");
     session_start();
     $categoriaDao = new CategoriaDao();
     $categoriaDao->mostrarTodosCategoriaApagar();   
    ?>	 
   </body>
</html>
