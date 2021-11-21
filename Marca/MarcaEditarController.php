<html lang ="pt-br">
<head>
<meta charset=utf-8">
<title>Formulario Do Administrador</title>
</head>
    <body>   
    <?php
     include_once ("MarcaDao.php");
     include_once("Marca.php");
     session_start();
     $marcaDao = new MarcaDao();
     $marcaDao->mostrarTodosMarca();   
    ?>	 
   </body>
</html>
