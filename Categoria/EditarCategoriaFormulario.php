<html lang ="pt-br">
<head>
<meta charset=utf-8">
<title>Formulario Do Administrador</title>

</head>
<body>
<?php
      include_once ("CategoriaDao.php");       
         
      session_start();
      $idCategoria = $_GET['var'];
      print $idCategoria;
      $categoriaDao = new CategoriaDao();
      $vecto  =  $categoriaDao->linhaMostrarId($idCategoria);
      $_SESSION['id'] = $idCategoria;
	
?>

   <h1>Editar Categoria</h1>
 
  <div id="formulario">               
         <form action="EditarCategoriaController.php" method="post" enctype="multipart/form-data" name="Formulario">          
           <input type ="text" name="descricao" value = "<?php echo $vecto['descricao']; ?>" />
           <input name="BotaoEditar" type="submit" value="Editar"/> 
            
         </form>
  </div>
 
</body>
</html>
