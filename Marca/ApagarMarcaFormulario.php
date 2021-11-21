<html lang ="pt-br">
<head>
<meta charset=utf-8">
<title>Formulario Do Administrador</title>

</head>
<body>
<?php
      include_once ("MarcaDao.php");       
         
      session_start();
      $idMarca = $_GET['var'];
      print $idMarca;
      $marcaDao = new MarcaDao();
      $vecto  =  $marcaDao->linhaMostrarId($idMarca);
      $_SESSION['id'] = $idMarca;
	
?>

   <h1>Apagar Marca</h1>
 
  <div id="formulario">               
         <form action="ApagarMarca.php" method="post" enctype="multipart/form-data" name="Formulario">          
           <input type ="text" name="descricao" value = "<?php echo $vecto['descricao']; ?>" />
           <input name="BotaoEditar" type="submit" value="Apagar"/> 
            
         </form>
  </div>
 
</body>
</html>
