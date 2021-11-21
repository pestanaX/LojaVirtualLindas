<?php 

    
    include_once("Cliente.php");	
    include_once("ClienteDao.php");
	
    session_start();

    $nome= $_POST["TextNome"];
    $sobrenome= $_POST["TextSobrenome"];
    $email= $_POST["TextEmail"];
    $senha= $_POST["TextSenha"];
    $confirmar=$_POST["TextConfirmar"];

    $cliente = new Cliente();
    $clienteDao =new ClienteDao();
    $cliente->setNome($nome);
    $cliente->setSobrenome($sobrenome);
    $cliente->setEmail($email);
    $cliente->setSenha($senha);
    if ($clienteDao->procurarCliente($email)==null){
       if($senha==$confirmar) 
	      if($senha<>null){   	   
	        $clienteDao->gravarDadoCliente($cliente);
	        $vectorCliente=$clienteDao->procurarCliente($email);
	        if ($vectorCliente['id_cliente']<>null){ 
	           $_SESSION ['idCliente']=$vectorCliente['id_cliente'];
	           $_SESSION ['nome'] =$vectorCliente['nome'];
	           $_SESSION ['sobrenome'] =$vectorCliente['sobrenome'];
	           header ('Location:http://localhost:8080/loja/Cliente/AreaCliente.php');
	   }
	   }else {
        echo '<script>';
        echo 'window.alert ("Confirmação da senha invalida")';
        echo '</script>';		
	   }
	}else {
		echo '<script>';
        echo 'window.alert ("Ja existente um usuario como este email")';
        echo '</script>';
		
		
	} 
?>
