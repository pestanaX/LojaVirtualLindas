
<html lang ="pt-br">
<head>
<meta charset=utf-8">
<link rel="stylesheet" href="css/tabelas.css">
<title>Formulario Do Administrador</title>
</head>
    <body>   
    <?php
     include_once ("UsuarioDao.php");
     session_start();
     $usuarioDao = new UsuarioDao();
     $usuarioDao->mostrarTodosUsuario();   
    ?>	 
   </body>
</html>
