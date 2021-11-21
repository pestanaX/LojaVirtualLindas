<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Categoria</title>
</head>
      
      
<body>
<?php 
      session_start();
      
	 
      
	  
?>
<section id="Cima">
             <h1>Loja</h1>
      </section>
      <div id ="formularioDiv">
            <form action="MarcaController.php" method="post" enctype="multipart/form-data" name="FormularioCategoria">
            <label id ="lbDescricao">Descricao </label>
            <input name="Descricao" id ="textDescricao" type="text" />
            <input name="botaoDescricao" type="submit" value="Gravar"/>
            </form> 
      </div>
</body>
</html>
