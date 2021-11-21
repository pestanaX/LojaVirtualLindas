<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Categoria</title>
</head>
<body>
<?php 
      session_start();
      
      echo "olá  ".$_SESSION['primeiroNome'];
      $username=$_SESSION['username'];
      if ($username==null){
	  header ('Location:http://localhost:8080/php/view/login.html');
      }
?>
<section id="Cima">
             <h1>Editar Categoria</h1>
 </section>
  <div id="formulario">               
         <form action="../controller/FormularioCategoriaEditar.php" method="post" enctype="multipart/form-data" name="FormularioProcurar">
          <label id =procurarCategoria>Pesquisa Categoria </label>
           <input type ="text" name="pesquisa" id="procurar" />
           <input name="Pesquisar" type="submit" value="Pesquisar"/> 
         </form>
  </div>
 
</body>
</html>
