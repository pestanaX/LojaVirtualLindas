<html lang ="pt-br">
<head>
<meta charset=utf-8">
<title>Formulario Do Administrador</title>
</head>
    <body>   
    <?php
     include_once ("ProdutoDao.php");
     session_start();
     $produtoDao = new ProdutoDao();
     $produtoDao->mostrarTodosProdutos2();   
    ?>	 
   </body>
</html>
