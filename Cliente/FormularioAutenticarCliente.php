<?php 

     
     include_once("ClienteDao.php");
	 
	 session_start();	 
	 $email=$_POST['TextEmail'];
         $senha =$_POST['TextSenha'];    
  	 $clienteDao = new ClienteDao ();
	 $cliente=$clienteDao->autenticaCliente($email ,$senha);
         $_SESSION['nome']=$cliente['nome'];
	 $_SESSION['idCliente']=$cliente['id_cliente'];
	     
        
         if ($cliente<>false){		
	    $_SESSION['nome']=$cliente['nome'];
	    $_SESSION['idCliente']=$cliente['id_cliente'];
	    header ('Location:http://localhost:8080/loja/Cliente/AreaCliente.php');
	 } else {
	   echo '<script>';
           echo 'window.alert ("Cliente não identificado")';
           echo '</script>';
	 }
?>
