<?php

       include_once ("UsuarioDao.php");

        $usuarioDao = new UsuarioDao();               
		 	
        $username= $_POST['TextUsername'];
	$password= $_POST['TextPassword'];
        
        session_start();
        $_SESSION['username'] =$username;      
        
        $userLogin= $usuarioDao->autenticarUsuario($username,$password);
        $_SESSION['nome'] =$userLogin;
        $_SESSION['idUsuario']=$usuarioDao->mostrarIdUsuario($username);

        if ($userLogin<>null){
            header ('Location:http://localhost:8080/loja/usuario/Menu.php');
        
         }else {
        
        }
	 	 
         
?>
