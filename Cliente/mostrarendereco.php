<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Endereco Entrega</title>
</head>

<body>
   <h1>Endereco</h1>
   
   <div id ="topo" >
   </div>
 
   <div id ="principal" >
    <?php 
            
	 include_once("ClienteDao.php");
         session_start();
         $idCliente=$_SESSION['idCliente'];
         $clienteDao = new ClienteDao();         
         if ($_SESSION['nome']==null){          
		  header ('Location:http://localhost:8080/index.php');
         }
         $clienteDao->mostrarEndereco($idCliente); 
    ?>
    <a href="EnderecoResidenciaEditar.php" id="modificar">Modificar Endereço</a>
   </div>
   <div id ="baixo" >
   </div>

</body>
</html>
